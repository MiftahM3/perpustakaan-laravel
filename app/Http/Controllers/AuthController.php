<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticating(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $request->session()->regenerate();
        if (Auth::attempt($credentials)) {

          if (Auth::user()->role_id == 1) {
            return redirect('dashboard')->with('success', 'Berhasil Login Akun! <br> Selamat datang ' . Auth::user()->username);
          }
        
            if (Auth::user()->role_id == 2) {
              return redirect('dashboard')->with('success', 'Berhasil Login Akun!<br> Selamat datang ' . Auth::user()->username);
            }
    
              elseif (Auth::user()->role_id == 3) {
                  return redirect('/home')->with('success', 'Berhasil Login Akun! <br> Selamat datang ' . Auth::user()->username);
                }
   
        }
        Session::flash('status', 'failed');
        Session::flash('massage','Login Invalid');
        return redirect('/login')->with('error', 'Login Gagal! ');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProses(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|unique:users|max:255|regex:/^\w+(?:_\w+)*$/',
            'email'=>'required|max:255',
            'password'=>'required|min:8|max:255',
        ],
            [
                'username.regex' => 'Username harus menggunakan underscore (_)!',
                'password.min' => 'Password harus 8 karakter !',
            ]);
         User::create([
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        
  
        return redirect('register')->with('success', 'Berhasil Membuat Akun!');
    }
}
