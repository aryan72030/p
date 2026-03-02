<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function Symfony\Component\Clock\now;

class CheckExpiry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->hasRole('admin')) {
            $expiry = Auth::user()->plan_expiry_date;
            if ($expiry < now())
            {
                return redirect()->route('subscription.index')->with('error', 'Your session has expired due to inactivity. Please try again.');
            }
        } else {
            $createid = Auth::user()->create_id;
            $admin_id = User::where('id', $createid)->first();
            $expiry = $admin_id->plan_expiry_date;

            if ($expiry < now()) {
                return redirect()->route('dashboard')->with('error', 'Your admin plan has expired. Please contect admin.');
            }
        }

        return $next($request);
    }
}
