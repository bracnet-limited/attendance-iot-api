<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'company_id' => 1,
            'email' => 'a1@gmail.com',
            'password' => 'aaaa',
            'account_type' => 'admin',
        ]);
        User::create([
            'name' => 'User1',
            'company_id' => 1,
            'email' => 'ub1@gmail.com',
            'password' => 'uuuu',
            'account_type' => 'user',
        ]);
        User::create([
            'name' => 'User2',
            'company_id' => 2,
            'email' => 'ul1@gmail.com',
            'password' => 'uuuu',
            'account_type' => 'user',
        ]);
        User::create([
            'name' => 'User3',
            'company_id' => 1,
            'email' => 'ub2@gmail.com',
            'password' => 'uuuu',
            'account_type' => 'user',
        ]);
    }
}
