<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ApiResponder;

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                return $this->error('Validation Error', $validator->errors(), 422);
            }

            $credentials = $request->only('email', 'password');

            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->error('Invalid credentials', null, 401);
            }

            // Store token in session
            session(['jwt_token' => $token]);

            $user = Auth::user();

            return $this->success([
                'user' => $user,
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => config('jwt.ttl') * 60
            ], 'Login successful', 200);

        } catch (\Exception $e) {
            return $this->error("Internal server error", null, 500);
        }
    }

    public function me()
    {
        try {
            $token = session('jwt_token');
            
            if (!$token) {
                return $this->error('Token not found', null, 401);
            }

            JWTAuth::setToken($token);
            $user = JWTAuth::authenticate();

            if (!$user) {
                return $this->error('User not found', null, 404);
            }

            return $this->success([
                'user' => $user
            ], 'User data retrieved successfully', 200);

        } catch (\Exception $e) {
            return $this->error("Internal server error", null, 500);
        }
    }

    public function logout()
    {
        try {
            $token = session('jwt_token');
            
            if ($token) {
                JWTAuth::setToken($token);
                JWTAuth::invalidate();
            }

            session()->forget('jwt_token');
            session()->flush();

            return $this->success(null, 'Logout successful', 200);

        } catch (\Exception $e) {
            return $this->error("Internal server error", null, 500);
        }
    }
}
