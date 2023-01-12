<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index()
    {
        return  view('home');
    }

    public function dashboard()
    {
        return  view('dashboard');
    }

    public function login()
    {
        return  view('login');
    }


    public function login_submit(Request $request)
    {
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active'
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }
        ;
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function registration()
    {
        return  view('registration');
    }

    public function registration_submit(Request $request)
    {
        $token=hash('sha256',time());
        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Active';
        $user->token =$token;
        $user->save();
    }
}
