<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;

use App\Models\User;
use App\Models\OrderHistory;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $users = User::get();

      return response()->json($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
      $user = User::query();
      if($request->pesanan){
        $user = $user->with('order');
      }

      $user = $user->findOrFail($id);

      return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::find($id);

      if(!$user){
        return response()->json(400);
      }

      if($request->name){
        $validator = Validator::make($request->all(), [
          'name' => 'required'
        ]);

        if($validator->fails()){
          return response()->json($validator->messages(), 200);
        }

        $update_user = $user->update([
          'name' => $request->name
        ]);
      }

      if($request->phone){
        $validator = Validator::make($request->all(), [
          'phone' => 'required|numeric'
        ]);

        if($validator->fails()){
          return response()->json($validator->messages(), 200);
        }

        $update_user = $user->update([
          'phone' => $request->phone
        ]);
      }

      if($request->birthdate){
        $update_user = $user->update([
          'birthdate' => $request->birthdate
        ]);
      }

      if($request->gender){
        $validator = Validator::make($request->all(), [
          'gender' => 'required|in:1,2'
        ]);

        if($validator->fails()){
          return response()->json($validator->messages(), 200);
        }

        $update_user = $user->update([
          'gender' => $request->gender
        ]);
      }

      if($update_user){
        return response()->json(['message' => 'success'], 200);
      }else{
        return response()->json(400);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword($id, Request $request){
      // todo harus terautentikasi dulu
      $user = User::find($id);

      if(!$user){
        return response()->json(['message' => 'no user found'], 200);
      }

      $validator = Validator::make($request->all(), [
        'old_password' => 'required',
        'new_password' => 'required|min:6',
        'new_password_confirm' => 'required'
      ]);

      if($validator->fails()){
        return response()->json($validator->messages(), 200);
      }

      if($request->new_password !== $request->new_password_confirm){
        return response()->json(['message' => 'new password confirmation did not match'], 200);
      }

      $password_check = Hash::check($request->old_password, $user->password);

      if(!$password_check){
        return response()->json(['message' => 'old password did not match'], 200);
      }

      $update_user = $user->update([
        'password' => Hash::make($request->new_password)
      ]);

      if($update_user){
        return response()->json(['message' => 'success'], 200);
      }else{
        return response()->json(['message' => 'error'], 400);
      }
    }
}
