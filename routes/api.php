<?php

use App\Http\Controllers\v1\AdminControllers\CardController;
use App\Http\Controllers\v1\AdminControllers\DeviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\ClientControllers\AttendanceController;

Route::post('/card-test/{d_number}/{c_number}', [AttendanceController::class, 'cardAttendanceValidity'])->name('cardAttendanceValidity');


Route::post('/device-store/{number}', [DeviceController::class, 'store'])->name('storeDevice');
Route::get('/devices', [DeviceController::class, 'getAllDevices'])->name('getAllDevices');
Route::get('/device/{number}', [DeviceController::class, 'getDevice'])->name('getDevice');
Route::post('/device/assign-company', [DeviceController::class, 'addCompanyToDevice'])->name('addCompanyToDevice');


Route::post('/card-store/{number}', [CardController::class, 'store'])->name('storeCard');
Route::get('/cards', [CardController::class, 'getAllCards'])->name('getAllCards');
Route::get('/card/{number}', [CardController::class, 'getCard'])->name('getCard');
Route::post('/card/assign-company', [CardController::class, 'addCompanyToCard'])->name('addCompanyToCard');

