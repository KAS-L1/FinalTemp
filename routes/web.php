<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Procurement\PurchaseRequisitionController;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Show login form
    Route::post('login', [AuthController::class, 'webLogin'])->name('web.auth.login'); // Process login

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('web.auth.register');

    Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'webLogout'])->name('logout');
});


Route::middleware(['auth', 'role:Admin|Super-Admin|Manager|Logistic'])->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/analytics', function () {
        return view('dashboard.analytics');
    })->name('analytics');
});




Route::get('requisitions', [PurchaseRequisitionController::class, 'index'])->name('requisitions.index');
Route::get('requisitions/{id}', [PurchaseRequisitionController::class, 'show'])->name('requisitions.show');
Route::get('requisitions/{id}/edit', [PurchaseRequisitionController::class, 'edit'])->name('requisitions.edit');
Route::delete('requisitions/{id}', [PurchaseRequisitionController::class, 'destroy'])->name('requisitions.destroy');
Route::get('requisitions/create', [PurchaseRequisitionController::class, 'create'])->name('requisitions.create');
Route::post('requisitions', [PurchaseRequisitionController::class, 'store'])->name('requisitions.store');


Route::get('/users', function () {
    return view('users.index');
});
// Route::middleware(['permission:view reports'])->group(function () {
//     Route::get('/reports', [ReportController::class, 'index']);
// });
