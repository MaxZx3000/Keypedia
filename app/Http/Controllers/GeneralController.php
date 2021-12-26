<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function get_home_page(){
        $categories = Category::all();
        $user = Auth::user();

        return view('keyboard.home', compact('categories', 'user'));
    }
}
