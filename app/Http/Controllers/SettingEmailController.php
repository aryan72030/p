<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Mime\Email;

class SettingEmailController extends Controller
{

    public function create()
    {
        if (!Auth::user()->isAbleTo('manage-email-setting')) {
            abort(403, 'Unauthorized');
        }

        $settings = getValue();

        return view('settings.email', compact('settings'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->isAbleTo('manage-email-setting')) {
            abort(403, 'Unauthorized');
        }

        foreach ($request->except('_token') as $key => $value) {
            Setting::setValue($key, $value, createid());
        }

        return redirect()->back()->with('success', 'email setting successfully');
    }
}
