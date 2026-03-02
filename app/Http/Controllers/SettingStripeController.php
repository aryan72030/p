<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingStripeController extends Controller
{
      public function create()
    {
        if (!Auth::user()->isAbleTo('manage-stripe-setting')) {
            abort(403, 'Unauthorized');
        }

        $settings = getValue();

        return view('settings.stripe', compact('settings'));
    }

    public function store(Request $request)
    {

        foreach ($request->except('_token') as $key => $value) {
            Setting::setValue($key, $value , createid());
        }

        return redirect()->back()->with('success', 'Stripe setting saved successfully');
    }
}
