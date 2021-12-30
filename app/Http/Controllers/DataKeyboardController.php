<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;

class DataKeyboardController extends Controller
{
    private function validate_keyboard_data(){

    }
    public function process_add_keyboard()
    {

    }
    public function process_delete_keyboard()
    {

    }
    public function process_edit_keyboard()
    {

    }
    public function get_edit_keyboard_page($keyboardID){
        $keyboard = Keyboard::where('id', $keyboardID)
                    ->first();
        $categories = Category::all();

        return view('keyboard.keyboard_data', compact("keyboard", "categories"));
    }
    public function get_add_keyboard_page(){
        return view('keyboard.keyboard_data');
    }
}
