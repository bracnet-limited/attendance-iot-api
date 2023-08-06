<?php

namespace App\Http\Controllers\v1\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store($number)
    {
        $check = Device::where('device_number', $number)->first();
        if($check){
            return response()->json(['success' => false, 'message' => 'Device already exist!!']);
        }

        try {
            $stored = Device::create([
                'device_number' => $number
            ]);

            // $this->addLog(action: 'DEVICE_STORED', data: $stored->toArray(), user: Auth::id());
            return response()->json(['data' => $stored, 'success' => true, 'message' => 'New device stored'], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
