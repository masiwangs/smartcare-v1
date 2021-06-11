<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
      $validator = \Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required|numeric',
        'email' => 'required|email',
        'password' => 'required'
      ]);

      if($validator->fails()){
        return response()->json([
          'status' => 'error',
          'message' => $validator->messages()
        ], 200);
      }

      $user = User::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);

      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json([
        'status' => 'success',
        'access_token' => $token,
        'token_type' => 'Bearer'
      ], 200);
    }

    public function login(Request $request){
      if(!Auth::attempt($request->only('email', 'password'))){
        return response()->json([
          'status' => 'error',
          'message' => 'invalid login credential'
        ], 401);
      }

      $user = User::where('email', $request->email)->firstOrFail();

      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json([
        'status' => 'success',
        'access_token' => $token,
        'token_type' => 'Bearer'
      ], 200);
    }

    public function me(Request $request){
      return $request->user();
    }

    public function logout(Request $request){
      $user = $request->user();
      $user->tokens()->delete();
      return response()->json([
        'status' => 'success',
        'message' => 'logged out'
      ], 200);
    }
}
