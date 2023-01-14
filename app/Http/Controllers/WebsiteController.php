<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        $query=DB::table('users')
          ->select('email','password')
          ->whereRaw('email =\'' . $request->email.'\'')
          ->whereRaw ('password=\''.$request->password.'\'')->first(); 


        if($query){
            return redirect()->route('dashboard')->with('query',json_encode($query) );
        }
        else{
            return redirect()->route('login');
        }
        print_r($query) ;
       // $querystr='select email,password from users where email=\''.$request->email.'\'';

      //  $credentialsDB= DB::select($querystr);
     //   echo (string)$credentialsDB[0];

      // if(1=1){
     //       return redirect()->route('dashboard');
      //  }else{
      //      return redirect()->route('login');
     //  }
       
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
        $user->password = $request->password;
        $user->status = 'Active';
        $user->token =$token;
        $user->save();
    }
}
