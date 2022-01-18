<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\Category;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends FileController
{
    public function process_my_cart_checkout(User $user)
    {
        $checkoutShoppingCarts = ShoppingCart::where('user_id', $user->id)->get();
        $message = "Your shopping cart data have been saved!";
        foreach ($checkoutShoppingCarts as $checkoutShoppingCart) {
            $keyboard = Keyboard::where('id', $checkoutShoppingCart->keyboard_id)
                                ->first();

            $todayDate = Carbon::now()->format('Y-m-d H:i:s');

            $transactionHistory = new Transaction([
                "user_id" => $user->id,
                "keyboard_name" => $keyboard["name"],
                "keyboard_image" => $keyboard["image"],
                "price_per_keyboard" => $keyboard["price"],
                "quantity" => $checkoutShoppingCart["quantity"],
                "date" => $todayDate
            ]);
            $transactionHistory->save();
        }

        ShoppingCart::where('user_id', $user->id)
                    ->delete();

        return redirect()
                ->route('history_transaction', ["user" => $user])
                ->with("message", array('success', $message));
    }
    public function process_my_cart_update_quantity(Request $request, User $user, Keyboard $keyboard)
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
                ->route('my_cart', ["user" => $user->id]);
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
        $header_categories = Category::all();
        return view('keyboard.keyboard_detail', compact('keyboard', 'user', 'header_categories'));
    }
    public function get_my_cart_page(User $user)
    {
        $header_categories = Category::all();
        $shoppingCarts = ShoppingCart::where('user_id', $user->id)->get();
        $keyboards = $this->get_keyboards_data($shoppingCarts);
        return view('transaction.shopping_cart', compact('shoppingCarts', 'keyboards', 'user', 'header_categories'));
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
    public function get_transaction_history_page(User $user)
    {
        $header_categories = Category::all();
        $transactions = Transaction::where('user_id', $user->id)
                                    ->distinct()
                                    ->get(['date']);
        return view("transaction.history_transactions", compact(["user", "transactions", "header_categories"]));
    }
    public function get_transaction_detail_page(User $user, $transactionDate)
    {
        $header_categories = Category::all();
        $transactions = Transaction::where('user_id', $user->id)
                                    ->where('date', $transactionDate)
                                    ->get();
        return view('transaction.detail_transaction', compact(['user', 'transactions', 'header_categories']));
    }
    private function validate_quantity_keyboard(Request $request, int $gtValue)
    {
        return $request->validate([
            "quantity" => "required|gt:$gtValue"
        ]);
    }

}
