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
            'device_number' => 'd584894265295',
            'company_id' => 2,
            'status' => 1,
        ]);
        Device::create([
            'device_number' => 'd584894985073',
        ]);
        Device::create([
            'device_number' => 'd584894987749',
            'company_id' => 1,
            'status' => 1,
        ]);
    }
}
