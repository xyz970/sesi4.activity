<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function loginPage()
    {
        return view('login');
    }
    function login(Request $request)
    {
        //untuk performa selalu batasi input dan ambil hanya input yang diperlukan
        $input = $request->only(['email','password']);
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = array(
                'email'=>$input['email'],
                'password'=>$input['password']
        );
        if (Auth::attempt($credentials)){
            //Ambil type dan sesuaikan dengan db
            // 1 => Admin, 2 => Manager, 0 => User
            if (Auth::user()->type == 1){
                return redirect()->route('admin.home');
            } else if (Auth::user()->type == 2){
                return redirect()->route('manager.home');
            }else{
                return redirect()->route('home');
            }

        }else{
            return redirect()->route('login')->with('error','Email atau kata sandi salah');
        }
    }
}
