<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Procurement\ProductController;
use App\Http\Controllers\Procurement\PurchaseItemController;
use App\Http\Controllers\Procurement\BudgetApprovalController;
use App\Http\Controllers\Procurement\RequestQuotationController;
use App\Http\Controllers\Procurement\PurchaseRequisitionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

// Public API Routes
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'apiLogin'])->name('api.auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('api.auth.register');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('api.auth.password.email');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('api.auth.password.update');
});

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'userProfile'])->name('api.user.profile');

    // User Management Routes
    Route::apiResource('users', UserController::class);

    // Procurement Routes
    Route::apiResource('products', ProductController::class);
    Route::apiResource('requisitions', PurchaseRequisitionController::class);
    Route::apiResource('items', PurchaseItemController::class);
    Route::apiResource('approvals', BudgetApprovalController::class);
    Route::apiResource('quotations', RequestQuotationController::class);

    // Assign Vendor Role
    Route::post('/assign-vendor/{userId}', [UserController::class, 'assignVendorRole'])->name('api.assign.vendor');

    // Logout
    Route::post('/logout', [AuthController::class, 'apiLogout'])->name('api.auth.logout');
});


Route::apiResource('permissions', PermissionController::class);
Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermission']);
Route::post('users/{user_id}/assign-role', [UserController::class, 'assignRole']);



Route::prefix('roles')->group(function () {
    Route::post('/', [RoleController::class, 'store']); // Create a new role
    Route::get('/', [RoleController::class, 'index']); // Get all roles
    Route::get('/{role}', [RoleController::class, 'show']); // Get a single role
    Route::put('/{role}', [RoleController::class, 'update']); // Update a role
    Route::delete('/{role}', [RoleController::class, 'destroy']); // Delete a role
    Route::post('/{role}/permissions', [RoleController::class, 'assignPermission']); // Assign permissions to a role
});
