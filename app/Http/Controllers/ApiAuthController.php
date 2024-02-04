<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, Auth};
use Exception;

class ApiAuthController extends Controller
{
    public function index(Request $request)
    {
        try {
            //---validation---
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return validationErrorHandler($validator->errors());
            }

            //---login---
            $remember_me = $request->has('remember_me') ? true : false;
            $credentials = $request->only('email', 'password');

            if (Auth::guard('web')->attempt($credentials, $remember_me)) {
                $user = User::where('email', $request->email)->first();
                $user->tokens()->delete();
                $token =  $user->createToken($user->name)->plainTextToken;
                $user['token'] = $token;

                return new \App\Http\Resources\AuthResource($user);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function store(Request $request)
    {
        try {
            //---validation---
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return validationErrorHandler($validator->errors());
            }

            //---create user---
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $token = $user->createToken($request->name)->plainTextToken;
            $user['token'] = $token;
            
            return new \App\Http\Resources\AuthResource($user);
        } catch (Exception $e) {
            return $e;
        }
    }
}
