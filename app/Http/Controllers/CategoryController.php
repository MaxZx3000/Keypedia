<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends FileController
{
    public function get_manage_categories_page(Category $category)
    {
        $user = Auth::user();
        $categories = Category::all();
        $message = session('message');
        return view('category.manage_category', compact('user', 'categories', 'message'));
    }
    public function get_edit_category_page(Category $category)
    {
        $user = Auth::user();
        return view('category.category_data', compact('user', 'category'));
    }
    public function process_edit_category(Request $request, Category $category)
    {
        $validatedData = $this->validate_category_data($request);

        $validatedData["image"] = $this->replace_file_data($request, $request->image, $category["image"]);

        $category->where('id', $category->id)
                 ->update($validatedData);



        $message = "$category->name has been successfully updated!";
        return redirect()
                ->route('category')
                ->with('message', array('success', $message));
    }
    public function process_delete_category(Category $category){
        $categoryName = $category->name;
        $category->delete();

        $message = "$categoryName has been successfully deleted!";


        return redirect()
                ->route('category')
                ->with('message', array('success', $message));
    }
    private function validate_category_data(Request $request){
        return $request->validate([
            'name' => 'required|unique:category,name,except,id|min:5',
            'image' => 'nullable|image'
        ]);
    }
}
