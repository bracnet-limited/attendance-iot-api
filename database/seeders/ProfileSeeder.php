<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'company_id' => 1,
            'card_id' => 1,
            'name' => 'Emp1',
            'employee_pin' => '11450',
            'email' => 'e@gmail.com',
        ]);
        Profile::create([
            'company_id' => 2,
            'card_id' => 2,
            'name' => 'Emp2',
            'employee_pin' => '11451',
            'email' => 'e2@gmail.com',
        ]);
        Profile::create([
            'company_id' => 1,
            'card_id' => 3,
            'name' => 'Emp3',
            'employee_pin' => '11452',
            'email' => 'e3@gmail.com',
        ]);
    }
}
