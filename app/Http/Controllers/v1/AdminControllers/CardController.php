<?php

namespace App\Http\Controllers\v1\AdminControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Card;

class CardController extends Controller
{
    public function store($number)
    {
        $check = Card::where('card_number', $number)->first();
        if($check){
            return response()->json(['success' => false, 'message' => 'Card already exist!!']);
        }

        try {
            $stored = Card::create([
                'card_number' => $number
            ]);

            // $this->addLog(action: 'CARD_STORED', data: $stored->toArray(), user: Auth::id());
            return response()->json(['data' => $stored, 'success' => true, 'message' => 'New card stored'], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
