<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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

    }
    public function process_delete_category(Category $category){
        $categoryName = $category->name;
        $category->delete();

        $message = "$categoryName has been successfully deleted!";

        return redirect()
                ->route('category')
                ->with('message', array('success', $message));
    }
}
