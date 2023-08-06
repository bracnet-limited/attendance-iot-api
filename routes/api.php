<?php

use App\Http\Controllers\v1\AdminControllers\CardController;
use App\Http\Controllers\v1\AdminControllers\DeviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\ClientControllers\AttendanceController;

Route::post('/card-test/{d_number}/{c_number}', [AttendanceController::class, 'cardAttendanceValidity'])->name('cardAttendanceValidity');


Route::post('/device-store/{device_number}', [DeviceController::class, 'store'])->name('storeDevice');
Route::get('/devices', [DeviceController::class, 'getAllDevices'])->name('getAllDevices');


Route::post('/card-store/{card_number}', [CardController::class, 'store'])->name('storeCard');
Route::get('/cards', [CardController::class, 'getAllCards'])->name('getAllCards');


