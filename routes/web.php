<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LanguageTranslationController;
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

Route::get('/test-language', function () {
    return view('test-language');
})->middleware('auth');

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
    Route::get('language/change/{code}', [LanguageController::class, 'change'])->name('language.change');
    Route::resource('language', LanguageController::class);
    Route::get('language-translation', [LanguageTranslationController::class, 'index'])->name('language-translation.index');
    Route::get('language-translation/{code}/edit', [LanguageTranslationController::class, 'edit'])->name('language-translation.edit');
    Route::put('language-translation/{code}', [LanguageTranslationController::class, 'update'])->name('language-translation.update');
});

require __DIR__ . '/auth.php';
