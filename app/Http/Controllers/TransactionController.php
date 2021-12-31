<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private function validate_detail_keyboard(Request $request){
        return $request->validate([
            "quantity" => "required|gt:0"
        ]);
    }
    public function get_detail_keyboard_page(Request $request, Keyboard $keyboard)
    {
        $keyboardQuantity = $request->quantity;
        $user = Auth::user();
        return view('keyboard.keyboard_detail', compact('keyboard', 'keyboardQuantity', 'user'));
    }
    public function get_transaction_history_page()
    {

    }
    public function process_detail_keyboard(Request $request)
    {
        $validatedData = $this->validate_detail_keyboard($request);
        
    }
    public function process_add_to_cart()
    {

    }
}
