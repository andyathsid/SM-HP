<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Spatie\Permission\Models\Permission;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes
Route::get('/', function() {
    return redirect('admin/login');
})->name('login');

// Admin Login
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

// Protected routes
Route::middleware(['auth', 'ShareAdminUsername'])->group(function () {
    // Admin Dashboard
    Route::get('admin', [AdminController::class, 'dashboard']);

    // RoomType Routes
    Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);
    Route::resource('admin/roomtype', RoomtypeController::class);

    // Users Management
    Route::resource('admin/user', UserController::class);
    Route::get('admin/user/{userId}/delete', [UserController::class, 'destroy']);

    // Permissions Management
    Route::get('admin/permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
    Route::resource('admin/permission', PermissionController::class);

    // Roles Management
    Route::get('admin/role/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::resource('admin/role', RoleController::class);
    Route::get('admin/role/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('admin/role/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    // Room
    Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);
    Route::resource('admin/rooms', RoomController::class);

    // Customer
    Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);
    Route::resource('admin/customer', CustomerController::class);

    // Delete Image
    Route::get('admin/roomtypeimage/delete/{id}', [RoomtypeController::class, 'destroy_image']);

    // Department
    Route::get('admin/department/{id}/delete', [StaffDepartmentController::class, 'destroy']);
    Route::resource('admin/department', StaffDepartmentController::class);

    // Staff Payment
    Route::get('admin/staff/payments/{id}', [StaffController::class, 'all_payments']);
    Route::get('admin/staff/payment/{id}/add', [StaffController::class, 'add_payment']);
    Route::post('admin/staff/payment/{id}', [StaffController::class, 'save_payment']);
    Route::get('admin/staff/payment/{id}/{staff_id}/delete', [StaffController::class, 'delete_payment']);

    // Staff CRUD
    Route::get('admin/staff/{id}/delete', [StaffController::class, 'destroy']);
    Route::resource('admin/staff', StaffController::class);

    // Booking
    Route::get('admin/booking/{id}/delete', [BookingController::class, 'destroy']);
    Route::get('admin/booking/available-rooms/{checkin_date}', [BookingController::class, 'available_rooms']);
    Route::resource('admin/booking', BookingController::class);

    // Service CRUD
    Route::get('admin/service/{id}/delete', [ServiceController::class, 'destroy']);
    Route::resource('admin/service', ServiceController::class);
});