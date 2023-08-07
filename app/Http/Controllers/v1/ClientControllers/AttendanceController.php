<?php

namespace App\Http\Controllers\v1\ClientControllers;

use App\Models\Card;
use App\Models\Device;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function cardAttendanceValidity($d_number, $c_number)
    {
        $device = Device::where('device_number', $d_number)->first();
        $card = Card::where('card_number', $c_number)->first();

        if($device && $card && ($device->company_id == $card->company_id)){
            $profile_id = Profile::where('card_id', $card->id)->pluck('id')->first();
            $this->addAttendanceLog(action: 'VALID_PUNCH', data: $card->toArray(), profile_id:$profile_id);
            return 'true';
        }

        $this->addAttendanceLog(action: 'INVALID_PUNCH', data: [$d_number, $c_number], profile_id:0);
        return 'false';
    }
}
