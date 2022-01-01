<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataKeyboardController extends FileController
{
    private function validate_keyboard_data(Request $request){
        return $request->validate([
            'category_id' => 'required',
            'name' => "required|min:5",
            'price' => "required|gt:0|integer",
            'description' => "required|min:20",
            'image' => 'nullable|mime:jpeg,bmp,png,jpg'
        ]);
    }

    public function process_add_keyboard(Request $request)
    {
        dd('Add Keyboard');
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
    public function process_edit_keyboard(Request $request, $keyboardID, $categoryID)
    {
        $validatedData = $this->validate_keyboard_data($request);
        $model = Keyboard::where('id', $keyboardID)->first();

        $validatedData["image"] = $this->replace_file_data($request, $request->image, $model["image"]);
        $model->update($validatedData);

        $keyboardName = $validatedData["name"];
        $message = "$keyboardName has been successfully edited!";

        return redirect()
                ->route('keyboard', ['categoryID' => $categoryID])
                ->withErrors(array('success', $message));
    }
    public function get_edit_keyboard_page($keyboardID, $categoryID){
        $keyboard = Keyboard::where('id', $keyboardID)
                    ->first();
        $categories = Category::all();
        $user = Auth::user();

        return view('keyboard.keyboard_data', compact("keyboard", "categories", "user", "categoryID"));
    }
    public function get_add_keyboard_page(){
        $user = Auth::user();
        $categories = Category::all();
        $keyboard = new Keyboard();

        return view('keyboard.keyboard_data', compact('keyboard', 'categories', 'user', 'categoryID'));
    }
}
