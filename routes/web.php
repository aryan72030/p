<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingEmailController;
use App\Http\Controllers\SettingStripeController;
use App\Http\Controllers\StaffAvailabilityController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserPlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

 

        Route::resource('employes', EmployesController::class)->middleware(['paln-expiry']);

        Route::resource('role', RoleController::class)->middleware(['paln-expiry']);

        Route::resource('blog', BlogController::class)->middleware(['paln-expiry']);

        Route::resource('service', ServiceController::class)->middleware(['paln-expiry']);
        Route::resource('staffAvailability', StaffAvailabilityController::class)->middleware(['paln-expiry']);
        Route::resource('appointment', AppointmentController::class)->middleware(['paln-expiry']);
        Route::get('appointment-calendar', [AppointmentController::class, 'calendar'])->name('appointment.calendar');


    Route::resource('email', SettingEmailController::class);

    Route::resource('stripe',SettingStripeController::class);

    Route::resource('plan', PlanController::class);
    Route::get('/plan-subscription', [UserPlanController::class, 'index'])->name('subscription.index');
    Route::post('/subscription/create/{id}', [UserPlanController::class, 'subscribe'])->name('subscribe.create');
    Route::get('/payment/success', [UserPlanController::class, 'paymentSuccess'])->name('payment.success');

    Route::resource('history', HistoryController::class);
});

require __DIR__ . '/auth.php';
