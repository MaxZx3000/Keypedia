<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function process_login(Request $request){
        $credentials = $this->validate_login($request);

        $user = User::where('email_address', $credentials["email_address"])
                    ->where('password', $credentials["password"])
                    ->first();

        if ($user){
            if ($user->role == 'M'){
                Auth::login($user);
            }
            else if ($user->role == 'C'){
                Auth::login($user);
            }
            return redirect()
                ->route('home');
        }
        else{
            $message = "Wrong email or password. Try again!";
            return redirect()
                ->route('login')
                ->with('message', array("danger", $message));
        }
    }
    public function process_register(Request $request){
        $validateUser = $this->validate_user($request);

        $user = new User($validateUser);
        $user->role = 'C';
        $user->save();

        $message = "Register success! You may now login with your inputted credentials!";

        return redirect()
            ->route('login')
            ->with('message', array("success", $message));
    }
    public function process_change_password(Request $request){

    }
    public function process_logout(){
        $message = ;
        Auth::logout();
        return redirect()
                ->route('login')
                ->with('message', array("success", ))
    }
    public function get_login_page(){
        $message = session('message');
        return view('auth.login', compact('message'));
    }
    public function get_register_page(){
        return view('auth.register');
    }
    public function get_change_password_page(){
        return view('register');
    }
    private function validate_user(Request $request, $userId = -1){
        return $request->validate([
            "username" => "required|min:5",
            "email_address" => "required|email|unique:users,email_address,$userId",
            "password" => "required|min:8",
            "confirm_password" => "required|in:$request->password",
            "address" => "required|min:10",
            "gender" => "required",
            "date_of_birth" => "required"
        ]);
    }
    private function validate_login(Request $request){
        return $request->validate([
            "email_address" => "required|email",
            "password" => "required"
        ]);
    }
}
