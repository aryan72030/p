<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAbleTo('manage-roles')) {
            abort(403, 'Unauthorized');
        }
        $admin=Role::first();
        $role = Role::where('id','!=',$admin->id)->get();
        return view('roles.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->isAbleTo('create-roles')) {
            abort(403, 'Unauthorized');
        }
        $premision = Permission::all();
        return view('roles.create', compact('premision'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAbleTo('create-roles')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')],
            'permission' => 'required|array',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->givePermissions($request->permission);

        return redirect()->route('role.index')->with('success', 'Create successfully');
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
        if (!Auth::user()->isAbleTo('edit-roles')) {
            abort(403, 'Unauthorized');
        }

        $role = Role::where('id', $id)->first();
        $premision = Permission::all();
        $chekpr = $role->permissions->pluck('name')->toArray();


        return view('roles.edit', compact('role', 'premision', 'chekpr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->isAbleTo('edit-roles')) {
            abort(403, 'Unauthorized');
        }

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->isAbleTo('delete-roles')) {
            abort(403, 'Unauthorized');
        }

        $role = Role::findOrFail($id);

        if ($role->users()->count() > 0) {
            return redirect()->route('role.index')->with('error', 'this roles  assigned to other user');
        }
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Delete successfully');
    }
}
