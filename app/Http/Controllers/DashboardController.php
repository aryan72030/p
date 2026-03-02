<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        if(Auth::user()->hasRole('admin')){
            $appointmet_count = Appointment::count('id');
        }else{
            $appointmet_count = Appointment::where('user_id',Auth::id())->count('id');
        }
        
        $pending = Appointment::where('status', 'pending')->count();
        $confirmed = Appointment::where('status', 'confirmed')->count();
        $cancelled = Appointment::where('status', 'cancelled')->count();


        return view('dashboard', compact('appointmet_count', 'pending', 'confirmed', 'cancelled'));
    }
}
