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
            if (!Auth::user()->plan_id || !Auth::user()->plan_expiry_date) {
                return redirect()->route('subscription.index')->with('error', 'You do not have an active plan. Please subscribe to a plan.');
            }
            
            $expiry = Auth::user()->plan_expiry_date;
            if ($expiry < now())
            {
                return redirect()->route('subscription.index')->with('error', 'Your plan has expired. Please renew your subscription.');
            }
        } else {
            $createid = Auth::user()->create_id;
            $admin_id = User::where('id', $createid)->first();
            
            if (!$admin_id || !$admin_id->plan_expiry_date) {
                return redirect()->route('dashboard')->with('error', 'Your admin does not have an active plan. Please contact admin.');
            }
            
            $expiry = $admin_id->plan_expiry_date;

            if ($expiry < now()) {
                return redirect()->route('dashboard')->with('error', 'Your admin plan has expired. Please contact admin.');
            }
        }

        return $next($request);
    }
}
