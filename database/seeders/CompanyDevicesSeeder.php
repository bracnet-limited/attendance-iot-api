<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyDevice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyDevice::create([
            'company_id' => 1,
            'device_id' => 1,
        ]);
        CompanyDevice::create([
            'company_id' => 2,
            'device_id' => 2,
        ]);
        CompanyDevice::create([
            'company_id' => 1,
            'device_id' => 4,
        ]);
    }
}
