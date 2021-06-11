<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
  public function login_view(){
    return view('pages.admin.login');
  }

  public function login(Request $request){
    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if($user->role === 'admin'){
      $credentials = $request->only('email', 'password');

      if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect('/administrator');
      };
    }

    return back()->withErrors([
      'password' => 'Email atau password tidak tepat'
    ]);
  }
}
