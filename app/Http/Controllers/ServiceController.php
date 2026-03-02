<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAbleTo('manage-service')) {
            abort(403, 'Unauthorized');
        }

        $service = Service::where('create_id',Auth::id())->get();
        return view('service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->isAbleTo('create-service')) {
            abort(403, 'Unauthorized');
        }

        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAbleTo('create-service')) {
            abort(403, 'Unauthorized');
        }

        if (!CheckService()) {
            return redirect()->route('subscription.index')->with('error', 'You have reached your employee limit. Please upgrade your plan.');
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $image = $request->file('image')->store('service_image', 'public');
        // dd($image);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $image,
            'create_id' => Auth::id(),
        ]);

        return redirect()->route('service.index')->with('success', 'Create successfully');
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
        if (!Auth::user()->isAbleTo('edit-service')) {
            abort(403, 'Unauthorized');
        }
        $service_upd = Service::where('id', $id)->first();
        return view('service.edit', compact('service_upd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $img = Service::find($id);
        if ($request->hasFile('image')) {
            $image = public_path('storage/') . $img->image;
            if (file_exists($image)) {
                @unlink($image);
            }
            $image = $request->file('image')->store('service_image', 'public');
        } else {
            $image = $img->image;
        }


        $img->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('service.index')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->isAbleTo('delete-service')) {
            abort(403, 'Unauthorized');
        }
        Service::where('id', $id)->delete();
        return redirect()->route('service.index')->with('success', 'Delete successfully');
    }
}
