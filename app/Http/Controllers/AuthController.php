<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function signUp(SignUpRequest $request){
        $user = User::create([
            'name'=> $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->update([
            'token' => Str::random(32)
        ]);
        $user->save();
        return response()->json([
            'user_token' => $user->token
        ]);
    }
    public function signIn(SignInRequest $request){
        if(!Auth::attempt($request->all())){
            return response()->json([
                'message' => 'Неверно введены данные',
            ],422);
        }
        $user = Auth::user();
        $user->update([
            'token' => Str::random(32)
        ]);
        $user->save();
        return response()->json([
            'user_token' => $user->token,
        ]);
    }
    public function logout(Request $request){
        $user = User::where('token', '!=', null)->first();
        $user->token = null;
        $user->save();
        return response()->json([
            'message' => 'Выход'
        ]);
    }
}
