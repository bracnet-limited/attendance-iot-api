<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Device::create([
            'device_number' => 'd584894985164',
            'company_id' => 1,
            'status' => 1,
        ]);
        Device::create([
            'device_number' => 'd584894265164',
            'company_id' => 2,
            'status' => 1,
        ]);
        Device::create([
            'device_number' => 'd584894985164',
        ]);
        Device::create([
            'device_number' => 'd584894987864',
            'company_id' => 1,
            'status' => 1,
        ]);
    }
}
