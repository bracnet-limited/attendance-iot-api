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

    public function getAllCards()
    {
        $cards = Card::get();

        if(count($cards) < 1){
            return response()->json(['success' => false, 'message' => 'No card found!!']);
        }

        return $cards;
    }

    public function getCard($number)
    {
        $card = Card::where('card_number', $number)->first();

        if(!$card){
            return response()->json(['success' => false, 'message' => 'Card not found!!']);
        }

        return $card;
    }

    public function deleteCard($number)
    {
        $card = Card::where('card_number', $number)->first();

        if(!$card){
            return response()->json(['success' => false, 'message' => 'Card not found!!']);
        }

        if($card->company_id != null){
            return response()->json(['success' => false, 'message' => 'Card is in use!!']);
        }

        $card->delete();

        // $this->addLog(action: 'DELETE_CARD', data: $card->toArray(), user: Auth::id());
        return response()->json(['data' => $card, 'success' => true, 'message' => 'Card deleted successfully!!'], 201);
    }

    public function addCompanyToCard(Request $request)
    {
        $card = card::where('card_number', $request->card_number)->first();

        if(!$card){
            return response()->json(['success' => false, 'message' => 'Card not found!!']);
        }

        if($card->company_id != null){
            return response()->json(['success' => false, 'message' => 'Card already in use!!']);
        }

        $card->update([
            'company_id' => $request->company_id,
        ]);

        // $this->addLog(action: 'COMPANY_ASSIGN_TO_CARD', data: $card->toArray(), user: Auth::id());
        return response()->json(['data' => $card, 'success' => true, 'message' => 'Compnay assigned to card successfully!!'], 201);
    }

    public function removeCompanyFromCard($number)
    {
        $card = card::where('card_number', $number)->first();

        if(!$card){
            return response()->json(['success' => false, 'message' => 'Card not found!!']);
        }

        if($card->company_id == null){
            return response()->json(['success' => false, 'message' => 'Card already not in use!!']);
        }

        $card->update([
            'company_id' => null,
        ]);

        // $this->addLog(action: 'COMPANY_REMOVE_FROM_CARD', data: $card->toArray(), user: Auth::id());
        return response()->json(['data' => $card, 'success' => true, 'message' => 'Compnay removed from card successfully!!'], 201);
    }

    public function enableCard($number)
    {
        $card = Card::where('card_number', $number)->first();

        if(!$card){
            return response()->json(['success' => false, 'message' => 'Card not found!!']);
        }

        if($card->company_id == null){
            return response()->json(['success' => false, 'message' => 'Card is not assigned yet!!']);
        }

        $card->update([
            'status' => 1,
        ]);

        // $this->addLog(action: 'ENABLE_CARD', data: $card->toArray(), user: Auth::id());
        return response()->json(['data' => $card, 'success' => true, 'message' => 'Card enabled successfully!!'], 201);
    }

    public function disableCard($number)
    {
        $card = Card::where('card_number', $number)->first();

        if(!$card){
            return response()->json(['success' => false, 'message' => 'Card not found!!']);
        }

        if($card->company_id == null){
            return response()->json(['success' => false, 'message' => 'Card is not assigned yet!!']);
        }

        $card->update([
            'status' => 0,
        ]);

        // $this->addLog(action: 'DISABLE_CARD', data: $card->toArray(), user: Auth::id());
        return response()->json(['data' => $card, 'success' => true, 'message' => 'Card disabled successfully!!'], 201);
    }
}
