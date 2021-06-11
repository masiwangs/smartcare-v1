<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function index(){
      $admins = User::where('role', 'admin')->get();
      return view('pages.admin.admin', compact('admins'));
    }

    public function show($id){
      $admin = User::where('id', $id)->where('role', 'admin')->firstOrFail();
      return view('pages.admin.admin-edit', compact('admin'));
    }

    public function create(){
      $users = User::where('role', 'user')->get();
      return view('pages.admin.admin-baru', compact('users'));
    }

    public function store(Request $request){
      $request->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);

      $check_password = Hash::check($request->password, Auth::user()->password);
      $user = User::where('email', $request->email)->first();

      if($check_password && $user){
        $user->update([
          'role' => 'admin'
        ]);
        return redirect('/administrator/admin')->with('success', 'Admin berhasil ditambahkan.');
      }else{
        return back()->with('error', 'Admin gagal ditambahkan');
      }
    }

    public function update($id, Request $request){
      $request->validate([
        'action' => 'required|in:reset,delete',
        'password' => 'required|min:6'
      ]);
      
      $admin = User::findOrFail($id);

      if($request->action === 'reset'){
        $update = $admin->update([
          'password' => Hash::make($request->password)
        ]);

        if($update){
          return back()->with('success', 'Reset password admin berhasil!');
        }else{
          return back()->with('danger', 'Reset password admin gagal!');
        }
      }else{
        $check = Hash::check($password, Auth::user()->password);
        if(!$check){
          return back()->with('error', 'Password Anda salah');
        }

        $update = $admin->update([
          'role' => 'client'
        ]);

        if($update){
          return back()->with('success', 'Berhasil menghapus admin!');
        }else{
          return back()->with('danger', 'Ggaal menghapus admin!');
        }
      }
    }
}
