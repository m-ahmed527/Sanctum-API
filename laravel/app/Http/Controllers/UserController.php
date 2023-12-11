<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $sanitized = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $user = User::create($sanitized);
        $token = $user->createToken($request->name)->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token,
        ], 201);
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'messege' => 'You are now Logged Out',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user=User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response([
                'messege'=>'User not Found !!!'
            ],401);
        }
        $token=$user->createToken($user->name)->plainTextToken;
        return response([
            'user'=>$user,
            'token'=>$token,
        ],200);
    }
}
