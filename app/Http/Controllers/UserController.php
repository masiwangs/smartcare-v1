<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
  public function index(){
    return view('pages.profile');
  }

  public function update(Request $request){
    $request->validate([
      'name' => 'required',
      'gender' => 'required|in:1,2',
      'birthdate' => 'required|date',
      'email' => 'required|email',
      'phone' => 'required|numeric'
    ]);

    $user = User::findOrFail(Auth::id());

    if(
      $user->update($request->all())
    ){
      return back()->with('message', 'Informasi akun berhasil diperbarui.');
    }else{
      return back()->with('message', 'Gagal memperbarui informasi akun. Coba lagi.');
    }
  }

  public function security(){
    return view('pages.security');
  }

  public function updateSecurity(Request $request){
    $request->validate([
      'password' => 'required',
      'new_password' => 'required|min:6',
      'new_password_confirm' => 'required|same:new_password'
    ]);

    $user = User::findOrFail(Auth::id());

    if(
      Hash::check($request->password, $user->password)
    ){
      return back()->with('message', 'Gagal. Password lama tidak cocok.');
    }

    if(
      $user->update([
        'password' => Hash::make($request->new_password)
      ])
    ){
      return back()->with('message', 'Password berhasil diperbarui.');
    }else{
      return back()->with('message', 'Gagal memperbarui password. Coba lagi.');
    }
  }
}
