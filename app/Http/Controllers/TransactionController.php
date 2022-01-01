<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\ShoppingCart;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function process_my_cart(Request $request, Keyboard $keyboard, User $user)
    {
        $validatedData = $this->validate_quantity_keyboard($request, -1);
        $shoppingCart = ShoppingCart::where('user_id', $user->id)
                        ->where('keyboard_id', $keyboard->id);

        if ($validatedData["quantity"] == 0){
            $shoppingCart->delete();
        }
        else{
            $shoppingCart->update([
                "quantity" => $validatedData["quantity"]
            ]);
        }

        return redirect()
                ->route('my_cart', ["user" => $user->id])
                ->with('message', "");
    }
    public function process_detail_keyboard(Request $request, Keyboard $keyboard)
    {
        $validatedData = $this->validate_quantity_keyboard($request, 0);
        $user = Auth::user();
        $shoppingCart = new ShoppingCart([
            "user_id" => $user->id,
            "keyboard_id" => $keyboard->id,
            "quantity" => $validatedData["quantity"],
        ]);
        try{
            $shoppingCart->save();
        }
        catch(Exception $e){
            $shoppingCart->where('user_id', $user->id)
                        ->where('keyboard_id', $keyboard->id)
                        ->update(["quantity" => $validatedData["quantity"]]);
        }

        return redirect()
                ->route('my_cart', ['user' => $user->id]);
    }
    public function get_detail_keyboard_page(Keyboard $keyboard)
    {
        $user = Auth::user();
        return view('keyboard.keyboard_detail', compact('keyboard', 'user'));
    }
    public function get_my_cart_page(User $user)
    {
        $shoppingCarts = ShoppingCart::where('user_id', $user->id)->get();
        $keyboards = $this->get_keyboards_data($shoppingCarts);
        return view('transaction.shopping_cart', compact('shoppingCarts', 'keyboards', 'user'));
    }
    private function get_keyboards_data($shoppingCarts){
        $keyboards = [];
        foreach ($shoppingCarts as $shoppingCart) {
            $filteredKeyboard = Keyboard::where('id', $shoppingCart->keyboard_id)
                                        ->get();
            array_push($keyboards, $filteredKeyboard);
        }
        return $keyboards;
    }
    public function get_transaction_history_page()
    {

    }
    private function validate_quantity_keyboard(Request $request, int $gtValue)
    {
        return $request->validate([
            "quantity" => "required|gt:$gtValue"
        ]);
    }

}
