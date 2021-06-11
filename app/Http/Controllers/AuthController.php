<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
  public function register () {
    return view('pages.register');
  }

  public function registerAction (Request $request) {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required|numeric',
      'password' => 'required|min:6'
    ]);

    // cek apakah email sudah ada
    $email_check = User::where('email', $request->email)->first();
    if($email_check){
      return back()->with('email', 'Email telah terdaftar');
    }
    
    // cek apakah email sudah ada
    $phone_check = User::where('phone', $request->phone)->first();
    if($phone_check){
      return back()->with('phone', 'Nomor HP telah terdaftar');
    }

    if(
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
      ])
    ){
      return redirect('/login')->with('message', 'Registrasi berhasil. Silahkan login');
    }else{
      return back()->with('message', 'Maaf coba sekali lagi');
    }
  }

  public function login () {
    return view('pages.login');
  }

  public function loginAction (Request $request){
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('dashboard');
    }
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }
}
