<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'BRACNet',
        ]);
        Company::create([
            'name' => 'Link3',
        ]);
        Company::create([
            'name' => 'DOT Internet',
        ]);
    }
}
