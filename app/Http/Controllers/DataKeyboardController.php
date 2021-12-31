<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataKeyboardController extends Controller
{
    private function validate_keyboard_data(Request $request){
        return $request->validate([
            'category' => 'required',
            'name' => "required|min:5",
            'price' => "required|lt:0|integer",
            'description' => "required|min:20",
            'image' => 'nullable|image'
        ]);
    }
    public function process_add_keyboard(Request $request)
    {
        $validatedData = $this->validate_keyboard_data($request);

        $keyboard = new Keyboard($validatedData);
        $keyboard->save();
    }
    public function process_delete_keyboard(Keyboard $keyboard)
    {
        $keyboardName = $keyboard->name;
        $keyboard->first()->delete();

        return redirect()
                ->back()
                ->withErrors(array("success", "$keyboardName has been deleted successfully!"));
    }
    public function process_edit_keyboard(Request $request)
    {
        $validatedData = $this->validate_keyboard_data($request);

        Keyboard::where('id', $validatedData["id"])->update();

        $keyboardName = $validatedData["name"];
        $message = "$keyboardName has been successfully edited!";

        return redirect()->back()->withErrors(array('success', $message));
    }
    public function get_edit_keyboard_page($keyboardID){
        $keyboard = Keyboard::where('id', $keyboardID)
                    ->first();
        $categories = Category::all();
        $user = Auth::user();
        return view('keyboard.keyboard_data', compact("keyboard", "categories", "user"));
    }
    public function get_add_keyboard_page(){
        $user = Auth::user();
        $categories = Category::all();

        $keyboard = new Keyboard();
        return view('keyboard.keyboard_data', compact('keyboard', 'user', 'categories'));
    }
}
