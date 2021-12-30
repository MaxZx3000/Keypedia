<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewKeyboardController extends Controller
{
    public function get_view_keyboard_page($categoryID){
        $keyboards = Keyboard::where('category_id', $categoryID)->get();
        $user = Auth::user();
        return view('keyboard.view_keyboard',
                compact('keyboards', 'user'));
    }
    public function process_filter_keyboard(Request $request){
        dd($request);
    }
}
