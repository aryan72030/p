<?php

namespace App\Http\Controllers;

use App\Models\StaffAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAbleTo('manage-staff')) {
            abort(403, 'Unauthorized');
        }

        $availability = StaffAvailability::where('user_id', Auth::id())->first();
        // dd($availability);
        return view('staff_availability.index', compact('availability'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $availability = [];

        foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
            if ($request->has("available_{$day}")) {
                $availability[$day] = [
                    'start' => $request->input("start_{$day}"),
                    'end' => $request->input("end_{$day}")
                ];
            }
        }

        StaffAvailability::updateOrCreate(
            ['user_id' => Auth::id()],
            ['availability' => $availability]
        );

        return redirect()->back()->with('success', 'Availability updated successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
