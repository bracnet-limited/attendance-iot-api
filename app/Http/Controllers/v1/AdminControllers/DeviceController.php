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

    public function getAllDevices()
    {
        $devices = Device::get();

        if(count($devices) < 1){
            return response()->json(['success' => false, 'message' => 'No device found!!']);
        }

        return $devices;
    }

    public function getDevice($number)
    {
        $device = Device::where('device_number', $number)->first();

        if(!$device){
            return response()->json(['success' => false, 'message' => 'Device not found!!']);
        }

        return $device;
    }

    public function deleteDevice($number)
    {
        $device = Device::where('device_number', $number)->first();

        if(!$device){
            return response()->json(['success' => false, 'message' => 'Device not found!!']);
        }

        if($device->company_id != null){
            return response()->json(['success' => false, 'message' => 'Device is in use!!']);
        }

        $device->delete();

        // $this->addLog(action: 'DELETE_CARD', data: $card->toArray(), user: Auth::id());
        return response()->json(['data' => $device, 'success' => true, 'message' => 'Device deleted successfully!!'], 201);
    }

    public function addCompanyToDevice(Request $request)
    {
        $device = Device::where('device_number', $request->device_number)->first();

        if(!$device){
            return response()->json(['success' => false, 'message' => 'Device not found!!']);
        }

        if($device->company_id != null){
            return response()->json(['success' => false, 'message' => 'Device already in use!!']);
        }

        $device->update([
            'company_id' => $request->company_id,
            'status' => 1,
        ]);

        // $this->addLog(action: 'COMPANY_ASSIGN_TO_DEVICE', data: $device->toArray(), user: Auth::id());
        return response()->json(['data' => $device, 'success' => true, 'message' => 'Compnay assigned to device successfully!!'], 201);
    }

    public function removeCompanyFromDevice($number)
    {
        $device = Device::where('device_number', $number)->first();

        if(!$device){
            return response()->json(['success' => false, 'message' => 'Device not found!!']);
        }

        if($device->company_id == null){
            return response()->json(['success' => false, 'message' => 'Device already not in use!!']);
        }

        $device->update([
            'company_id' => null,
        ]);

        // $this->addLog(action: 'COMPANY_REMOVED_FROM_DEVICE', data: $device->toArray(), user: Auth::id());
        return response()->json(['data' => $device, 'success' => true, 'message' => 'Compnay removed from device successfully!!'], 201);
    }

    public function enableDevice($number)
    {
        $device = Device::where('device_number', $number)->first();

        if(!$device){
            return response()->json(['success' => false, 'message' => 'Device not found!!']);
        }

        if($device->company_id == null){
            return response()->json(['success' => false, 'message' => 'Device is not assigned yet!!']);
        }

        $device->update([
            'status' => 1,
        ]);

        // $this->addLog(action: 'ENABLE_DEVICE', data: $device->toArray(), user: Auth::id());
        return response()->json(['data' => $device, 'success' => true, 'message' => 'Device enabled successfully!!'], 201);
    }

    public function disableDevice($number)
    {
        $device = Device::where('device_number', $number)->first();

        if(!$device){
            return response()->json(['success' => false, 'message' => 'Device not found!!']);
        }

        if($device->company_id == null){
            return response()->json(['success' => false, 'message' => 'Device is not assigned yet!!']);
        }

        $device->update([
            'status' => 0,
        ]);

        // $this->addLog(action: 'DISABLE_DEVICE', data: $device->toArray(), user: Auth::id());
        return response()->json(['data' => $device, 'success' => true, 'message' => 'Device disabled successfully!!'], 201);
    }
}
