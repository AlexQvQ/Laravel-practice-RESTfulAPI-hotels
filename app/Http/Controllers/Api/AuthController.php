<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            throw ValidationException::withMessages([
                'email' => ['ERROR']
            ]);
        }
        if(!Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['ERROR']
            ]);
        }
        $token = $user->createToken('apitoken')->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
        // return $user;
    }
    public function logout(Request $request){
        $request->user->tokens->delete();
        return response()->json([
            'message' => 'bye bye <3'
        ]);
    }
}
