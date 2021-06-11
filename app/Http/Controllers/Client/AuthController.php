<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function loginView(){
    if(Auth::check()){
      return redirect('/dashboard');
    }
    return view('pages.client.login');
  }

  public function login(Request $request){
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('dashboard');
    }
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function register(){
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

  public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
