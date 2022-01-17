<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataKeyboardController extends FileController
{
    public function process_add_keyboard(Request $request)
    {
        $validatedData = $this->validate_keyboard_data($request);

        $keyboard = new Keyboard($validatedData);
        $keyboard["image"] = $this->save_file_data($request, $request->image, 'images/keyboards');
        $keyboard->save();

        $message = "$keyboard->name has been successfully added!";

        return redirect()
                ->route('home')
                ->with('message', $message);
    }
    public function process_delete_keyboard(Category $category, Keyboard $keyboard)
    {
        $keyboardName = $keyboard->name;
        $keyboard->first()->delete();

        return redirect()
                ->route('keyboard', $category->id)
                ->withErrors(array("success", "$keyboardName has been deleted successfully!"));
    }
    public function process_edit_keyboard(Request $request, $keyboardID, $categoryID)
    {
        $validatedData = $this->validate_keyboard_data($request);
        $model = Keyboard::where('id', $keyboardID)->first();

        $validatedData["image"] = $this->replace_file_data($request, $request->image, 'images/keyboards', $model["image"]);
        $model->update($validatedData);

        $keyboardName = $validatedData["name"];
        $message = "$keyboardName has been successfully edited!";

        return redirect()
                ->route('keyboard', ['categoryID' => $categoryID])
                ->withErrors(array('success', $message));
    }

    public function get_edit_keyboard_page($categoryID, Keyboard $keyboard){
        $categories = Category::all();
        $user = Auth::user();

        return view('keyboard.keyboard_data', compact("keyboard", "categories", "user", "categoryID"));
    }
    public function get_add_keyboard_page(){
        $user = Auth::user();
        $categories = Category::all();
        $keyboard = new Keyboard();

        return view('keyboard.keyboard_data', compact('keyboard', 'categories', 'user'));
    }

    private function validate_keyboard_data(Request $request){
        return $request->validate([
            'category_id' => 'required',
            'name' => "required|min:5",
            'price' => "required|gt:0|integer",
            'description' => "required|min:20",
            'image' => 'nullable|image'
        ]);
    }
}
