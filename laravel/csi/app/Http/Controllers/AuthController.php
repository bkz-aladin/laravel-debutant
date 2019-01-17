<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function checkLogin(Request $request){
       if($request->email == "admin@gmail.com" && $request->password == 1234){
          //Connecté
           $request->session()->put('auth', true);
            return redirect('/admin/home');

       }
       else{
           return redirect('/login')->with('error', 'Email ou mdp faux');
       }
    }

    public function logout(){
        session()->forget('auth');
        return redirect('login');
    }
}

