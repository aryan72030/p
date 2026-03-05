<?php

use App\Models\Plan;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

function getValue()
{
    return Setting::where('create_id', createid())->get();
}


function email_config()
{
    $setting = Setting::where('create_id', createid())->pluck('value', 'key');
    try {
        Config::set('mail.default', $setting['mail_mailer']);
        Config::set('mail.mailers.smtp.host', $setting['mail_host']);
        Config::set('mail.mailers.smtp.port', $setting['mail_port']);
        Config::set('mail.mailers.smtp.username', $setting['mail_username']);
        Config::set('mail.mailers.smtp.password', $setting['mail_password']);
        Config::set('mail.mailers.smtp.encryption', $setting['mail_encryption']);
        Config::set('mail.mailers.from.address', $setting['mail_address']);
        Config::set('mail.mailers.from.name', $setting['mail_name']);
    } catch (Exception $e) {
        Log::error("Message: " . $e->getMessage());
    }
}

function createid()
{
    if (Auth::user()->hasRole('admin')) {
        return Auth::user()->id;
    } else {
        $id = Auth::user()->create_id;
        return $id;
    }
}

function stripe_config()
{
    $setting = Setting::where('create_id', createid())->pluck('value', 'key');
    try {
        Config::set('services.stripe.key', $setting['stripe_key']);
        Config::set('services.stripe.secret', $setting['stripe_secret']);
    } catch (Exception $e) {
        Log::error("Stripe Config Error: " . $e->getMessage());
    }
}

function checkEmployee()
{
    $user = Auth::user();

    if (!$user->plan_id || !$user->plan) {
        return ['status' => false, 'message' => 'You do not have an active plan. Please subscribe to a plan.'];
    }

    if ($user->plan_expiry_date && $user->plan_expiry_date < now()) {
        return ['status' => false, 'message' => 'Your plan has expired. Please renew your subscription.'];
    }

    $employeeCount = User::where('create_id', $user->id)->count();
    $canAdd = $employeeCount < $user->plan->max_employees;
    
    return ['status' => $canAdd, 'message' => $canAdd ? '' : 'You have reached your employee limit. Please upgrade your plan.'];
}

function CheckService()
{
    $user = Auth::user();

    if (!$user->plan_id || !$user->plan) {
        return ['status' => false, 'message' => 'You do not have an active plan. Please subscribe to a plan.'];
    }

    if ($user->plan_expiry_date && $user->plan_expiry_date < now()) {
        return ['status' => false, 'message' => 'Your plan has expired. Please renew your subscription.'];
    }

    $serviceCount = Service::where('create_id', createid())->count();
    $canAdd = $serviceCount < $user->plan->max_service;
    
    return ['status' => $canAdd, 'message' => $canAdd ? '' : 'You have reached your service limit. Please upgrade your plan.'];
}




