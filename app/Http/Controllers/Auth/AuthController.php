<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerUser(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|unique:users,email|min:5|max:255',
            'password' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create($request->all());

        return response()->json([
            "status" => true,
            "message" => "User created successfully",
            "data" => $user
        ], 201);
    }

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                "status" => false,
                "message" => "Incorrect email/password"
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'user' => $user,
            'access_token' => $token,
            'type_token' => 'Bearer'
        ], 200);
    }

    public function logout()
    {
        if (Auth::check()) {
            //the comment below just to ignore intelephense(1013) annoying error.
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $user->tokens()->delete();
            return response()->json([
                'status' => true,
                'message' => 'Logout successful'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No authenticated user'
            ], 401);
        }
    }
}
