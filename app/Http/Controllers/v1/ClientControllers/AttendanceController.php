<?php

namespace App\Http\Controllers\v1\ClientControllers;

use App\Models\Card;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function cardAttendanceValidity($d_number, $c_number)
    {
        $device = Device::where('device_number', $d_number)->first();

        if(!$device){
            return 'false';
        }

        $card = Card::where('card_number', $c_number)->first();

        if(!$card){
            return 'false';
        }

        if($device->company_id == $card->company_id){
            return 'true';
        }

        return 'false';
    }
}
