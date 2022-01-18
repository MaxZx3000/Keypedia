<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function get_home_page(){
        $categories = Category::all();
        $header_categories = Category::all();
        $user = Auth::user();
        
        return view('keyboard.home', compact('categories', 'user', 'header_categories'));
    }
}
