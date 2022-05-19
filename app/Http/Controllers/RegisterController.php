<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;     

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('registration');   
    }

    public function showForgotForm()
    {
        return view('forgot');   
    }

    public function showLoginForm()
    {
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');   
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }

    public function registration(Request $request){
       
        $validateParameters = $request->validate([
            'name' => ["required", "string", "unique:users,name"],
            'email' => ["required", "email", "string", "unique:users,email"],
            'password' => ["required", "confirmed"]
        ]);

        $user = User::create([
            "name" => $validateParameters["name"],
            "email" => $validateParameters["email"],
            "password" => bcrypt($validateParameters["password"]),
        ]);

        if($user){
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }

    public function forgot(Request $request){
       
        $validateParameters = $request->validate([
            'email' => ["required", "email", "string", "exists:users,email"],
        ]);

        $user = User::where(["email" => $data["email"]])->first();
        
        $password = $uniqid();

        $user->password = bcrypt($password);
        $user->save();
        Mail::to($user)->send(new ForgotPassword($password));
        
        return redirect(route("home"));
    }

    public function login(Request $request){
       
        $validateParameters = $request->validate([
            'email' => ["required", "email", "string"],
            'password' => ["required"]
        ]);

        if(auth("web")->attempt($validateParameters)){
            return redirect(route("home"));
        };

        return redirect(route("login"))->withErrors(["email" => "User is not found or data is incorrect"]);
    }

}
