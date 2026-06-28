<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('User.create');
    }

    public function store(Register $register){
        $data = $register->validated();
        $user= User::create($data);

        Auth::login($user);

        return redirect('/')->with('message', 'User created sucessfully And Logged In!');
    }

    public function logout(Request $request) {
        Auth::logout();

    $request->session()->invalidate();


    $request->session()->regenerateToken();

        //dd('Check if Auth::check() is false');

        return redirect('/')->with('message', 'You have been logged out!');

    }

    public function login(){
        return view('User.login');
    }

    public function authenticate(Login $login)
    {
    $data = $login->validated();

    if (Auth::attempt($data)) {
        request()->session()->regenerate();

        return redirect('/')->with('message', 'You are now logged in!');
    }

    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
