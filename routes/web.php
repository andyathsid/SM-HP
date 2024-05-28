<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;

Route::get('admin', function () {
    return view('dashboard');
});


Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomtypeController::class);