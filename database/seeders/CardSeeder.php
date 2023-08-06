<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::create([
            'card_number' => 'c684894985164',
            'company_id' => 1,
            'status' => 1,
        ]);
        Card::create([
            'card_number' => 'c684894265987',
            'company_id' => 2,
            'status' => 1,
        ]);
        Card::create([
            'card_number' => 'c684894985746',
        ]);
        Card::create([
            'card_number' => 'c684894987864',
            'company_id' => 1,
            'status' => 1,
        ]);
    }
}
