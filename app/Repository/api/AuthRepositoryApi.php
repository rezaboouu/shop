<?php

namespace App\Repository\api;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\admin;
use App\Models\User;
use App\Repository\api\Contract\AuthRepositoryInterfaceApi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class AuthRepositoryApi implements AuthRepositoryInterfaceApi
{

    public function login(LoginRequest $request): JsonResponse
    {
        $email=$request["email"];
        $password=$request["password"];

        // Find user by email
        $user = User::where('email', $email)->first();
        $admin = Admin::where('email', $email)->first();

        if (!$user) {
            // User with the provided email not found
            return response()->json([
                'code' => 2,
                'message' => 'نام کاربری یا پسوورد اشتباه است',
                'data' => null,
            ], 400);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $accessToken = Auth::user()->createToken("authToken")->accessToken;

            return response()->json([
                'code' => 0,
                'message' => 'success',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $email,
                    'type' => $user->type,
                    'token' => $accessToken,
                ]
            ], 200);
        } else {
            // Invalid password
            return response()->json([
                'code' => 2,
                'message' => 'نام کاربری یا پسوورد اشتباه است',
                'data' => null,
            ], 400);
        }
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user=User::create($request->all());
        $accessToken = $user->createToken("authToken")->accessToken;
        $user['token']=$accessToken;

        if ($user){
            return response()->json([
                'code' => 1,
                'message' => 'عملیات با موفقیت انجام شد',
                'data' => $user,
            ], 200);
        }
        return response()->json([
            'code' => 2,
            'message' => 'نام کاربری یا پسوورد اشتباه است',
            'data' => null,
        ], 400);
    }
}
