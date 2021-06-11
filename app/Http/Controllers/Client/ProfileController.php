<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\Models\User;

class ProfileController extends Controller
{
  public function index(){
    return view('pages.client.profile');
  }

  public function update(Request $request){
    $request->validate([
      'name' => 'required',
      'gender' => 'required|in:1,2',
      'birthdate' => 'required',
      'email' => 'required',
      'phone' => 'required'
    ]);

    $user = User::find(Auth::id());

    $update = $user->update($request->all());

    if($update){
      return back()->with('success', 'Berhasil update profil');
    }else{
      return back()->with('error', 'Gagal update profil');
    }
  }

  public function updatePassword(Request $request){
    $request->validate([
      'old_password' => 'required',
      'password' => 'required|min:6',
      'password_confirm' => 'required|same:password'
    ]);

    $user = User::find(Auth::id());

    $check_old_password = Hash::check($request->old_password, $user->password);

    if($check_old_password){
      $update = $user->update([
        'password' => Hash::make($request->password)
      ]);
      return back()->with('success', 'Berhasil mengubah password');
    }else{
      return back()->with('success', 'Gagal mengubah password');
    }
  }
}
