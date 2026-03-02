<?php

namespace App\Http\Controllers;

use App\Mail\employessmail;
use App\Models\Emailsetting;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAbleTo('manage-employees')) {
            abort(403, 'Unauthorized');
        }

        $user = User::where('create_id', Auth::id())->get();
        return view('employess.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->isAbleTo('create-employees')) {
            abort(403, 'Unauthorized');
        }

        if (!checkEmployee()) {
            return redirect()->route('subscription.index')->with('error', 'You have reached your employee limit. Please upgrade your plan.');
        }

        $role = Role::get();
        return view('employess.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAbleTo('create-employees')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $arr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'create_id' => Auth::id(),
        ];

        $role = User::create($arr);
        $role->addRole($request->role);

        email_config();

        try {
            Mail::to($request->email)->send(new employessmail($request->password, $request->email, $request->name));
        } catch (Exception $e) {
            Log::error("Mail send message: " . $e->getMessage());
        }

        return redirect()->route('employes.index')->with('success', 'Create emaployess and send mail successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->isAbleTo('edit-employees')) {
            abort(403, 'Unauthorized');
        }
        $role = Role::get();
        $update = User::findOrFail($id);
        return view('employess.edit', compact('update', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $emp = User::findOrFail($id);

        $emp->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        $emp->syncRoles([$request->role]);

        return redirect()->route('employes.index')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->isAbleTo('delete-employees')) {
            abort(403, 'Unauthorized');
        }
        User::where('id', $id)->delete();
        return redirect()->route('employes.index')->with('success', 'Delete successfully');
    }
}
