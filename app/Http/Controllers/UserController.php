<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){
        return view("users.register");
    }

    public function store(Request $request){
        $formFields = $request->validate([
            "name" => ["required","min:3"],
            "email"=> ["email",Rule::unique("users","email"),"required"],
            "password"=>"required|confirmed|min:6",
        ]);
        $formFields["password"] = bcrypt($formFields[
            "password"
        ]);
        $user = User::create($formFields);
        auth()->login($user);
        //dd(auth()->user());
        return redirect("/")->with("message","loggedIn");
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("message","you are loggout out");
    }

    public function login(){
        return view("users.login");
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            "email"=> ["email","required"],
            "password"=>"required",
        ]);  
        
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect("/")->with("message","you are now loggedin!");
        }

        return back()->withErrors(["email"=>"invalid credintials"])->onlyInput("email");
    }
}
