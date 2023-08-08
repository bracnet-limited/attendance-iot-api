<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\AdminControllers\CardController;
use App\Http\Controllers\v1\AdminControllers\UserController;
use App\Http\Controllers\v1\AdminControllers\DeviceController;
use App\Http\Controllers\v1\ClientControllers\AttendanceController;


Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/card-test/{d_number}/{c_number}', [AttendanceController::class, 'cardAttendanceValidity'])->name('cardAttendanceValidity');

// Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/device-store/{device_number}', [DeviceController::class, 'store'])->name('storeDevice');
    Route::get('/devices', [DeviceController::class, 'getAllDevices'])->name('getAllDevices');
    Route::get('/device/{device_number}', [DeviceController::class, 'getDevice'])->name('getDevice');
    Route::post('/device/delete/{device_number}', [DeviceController::class, 'deleteDevice'])->name('deleteDevice');
    Route::post('/device/assign-company', [DeviceController::class, 'addCompanyToDevice'])->name('addCompanyToDevice');
    Route::post('/device/remove-company/{device_number}', [DeviceController::class, 'removeCompanyFromDevice'])->name('removeCompanyFromDevice');
    Route::post('/device/enable/{device_number}', [DeviceController::class, 'enableDevice'])->name('enableDevice');
    Route::post('/device/disable/{device_number}', [DeviceController::class, 'disableDevice'])->name('disableDevice');


    Route::post('/card-store/{card_number}', [CardController::class, 'store'])->name('storeCard');
    Route::get('/cards', [CardController::class, 'getAllCards'])->name('getAllCards');
    Route::get('/card/{card_number}', [CardController::class, 'getCard'])->name('getCard');
    Route::post('/card/delete/{card_number}', [CardController::class, 'deleteCard'])->name('deleteCard');
    Route::post('/card/assign-company', [CardController::class, 'addCompanyToCard'])->name('addCompanyToCard');
    Route::post('/card/remove-company/{card_number}', [CardController::class, 'removeCompanyFromCard'])->name('removeCompanyFromCard');
    Route::post('/card/enable/{card_number}', [CardController::class, 'enableCard'])->name('enableCard');
    Route::post('/card/disable/{card_number}', [CardController::class, 'disableCard'])->name('disableCard');

// });
