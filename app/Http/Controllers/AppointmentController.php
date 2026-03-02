<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\StaffAvailability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAbleTo('manage-appointment')) {
            abort(403, 'Unauthorized');
        }
        if (Auth::user()->hasRole('admin')) {
            $appointments = Appointment::with('staff.availability', 'users')->get();
        } else {
            $appointments = Appointment::with('staff.availability', 'users')->where('user_id', Auth::id())->get();
        }

        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->isAbleTo('create-appointment')) {
            abort(403, 'Unauthorized');
        }

        $staff = User::whereHasRole('staff')
            ->whereHas('availability')
            ->with('availability')
            ->get();

        $service = Service::where('status', 'Active')->get();
        $customers = Auth::user()->hasRole('admin') ? User::whereHasRole('coustomer')->get() : null;
        return view('appointment.create', compact('service', 'staff', 'customers'));
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        if (!Auth::user()->isAbleTo('create-appointment')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'service' => 'required',
            'appointment_date' => 'required|date',
            'start_time' => 'required',
        ]);

        $arr = [
            'service' => $request->service,
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'staff_id' => $request->staff_id,
            'user_id' => Auth::user()->hasRole('admin') && $request->customer_id ? $request->customer_id : Auth::id(),
        ];
        Appointment::create($arr);
        return redirect()->route('appointment.index')->with('success', 'Create successfully');
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
        if (!Auth::user()->isAbleTo('edit-appointment')) {
            abort(403, 'Unauthorized');
        }
        $staff = User::whereHasRole('staff')
            ->whereHas('availability')
            ->with('availability')
            ->get();
        $service = Service::where('status', 'Active')->get();

        $appointment = Appointment::where('id', $id)->first();
        return view('appointment.edit', compact('service', 'appointment', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->isAbleTo('edit-appointment')) {
            abort(403, 'Unauthorized');
        }

        if ($request->status) {
            Appointment::where('id', $id)->update(['status' => $request->status]);
            return redirect()->route('appointment.index')->with('success', 'status update successfully');
        } else {

            $arr = [
                'service' => $request->service,
                'appointment_date' => $request->appointment_date,
                'start_time' => $request->start_time,
                'staff_id' => $request->staff_id,
            ];

            Appointment::where('id', $id)->update($arr);
            return redirect()->route('appointment.index')->with('success', 'update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->isAbleTo('delete-appointment')) {
            abort(403, 'Unauthorized');
        }
        Appointment::where('id', $id)->delete();
        return redirect()->route('appointment.index')->with('success', 'delete successfully');
    }

    public function calendar(){
             $appointments = Auth::user()->hasRole('admin') 
            ? Appointment::with('staff', 'users')->get() 
            : Appointment::with('staff', 'users')->where('user_id', Auth::id())->get();
          
        return view('appointment.calendar',compact('appointments'));
    }
}
