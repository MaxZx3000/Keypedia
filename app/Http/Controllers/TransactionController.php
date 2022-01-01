<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\ShoppingCart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function get_transaction_history_page()
    {

    }
    public function process_add_to_cart()
    {

    }
    public function process_detail_keyboard(Request $request, Keyboard $keyboard)
    {
        $validatedData = $this->validate_quantity_keyboard($request);

        $user = Auth::user();

        $shoppingCart = new ShoppingCart([
            "user_id" => $user->id,
            "quantity" => $validatedData["quantity"],
            "keyboard_id" => $keyboard->id,
        ]);
        try{
            $shoppingCart->save();
        }
        catch(Exception $e){
            $shoppingCart->where('user_id', $user->id)
                        ->where('keyboard_id', $keyboard->id)
                        ->update(["quantity" => $validatedData["quantity"]]);
        }

        $shoppingCarts = ShoppingCart::where('user_id', $user->id)->get();
        $keyboards = [];

        foreach ($shoppingCarts as $shoppingCart) {
            $filteredKeyboard = Keyboard::where('id', $shoppingCart->keyboard_id)->get();
            array_push($keyboards, $filteredKeyboard);
        }
        return view('transaction.shopping_cart', compact('shoppingCarts', 'keyboards', 'user'));
    }
    public function get_detail_keyboard_page(Keyboard $keyboard)
    {
        $user = Auth::user();
        return view('keyboard.keyboard_detail', compact('keyboard', 'user'));
    }
    private function validate_quantity_keyboard(Request $request)
    {
        return $request->validate([
            "quantity" => 'required|min:0'
        ]);
    }
}
