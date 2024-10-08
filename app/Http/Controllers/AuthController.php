<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    public function register (Request $request) {
        try {
            $validator = Validator::make($request->all(),
            [
                'name' => 'required|string|max:255',
                'email' =>  'required|string|max:255|email',
                'password' => 'required|string|min:8|confirmed',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),422
                ]);
            }
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        } catch (QueryException $e)    {
            return response()->json([
                'success' => false,
                'message' => 'Database exception occured',
                'error' => $e->getMessage(),
            ],500);

        } 
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
