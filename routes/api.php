<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\ClientControllers\AttendanceController;

Route::post('/card-test/{d_number}/{c_number}', [AttendanceController::class, 'cardAttendanceValidity'])->name('cardAttendanceValidity');
