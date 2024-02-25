<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function authenticate(Request $request) {
        $credentials  = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials )) {
            return response()->json([
                'user' => auth()->user(),
            ]);
        }
        else {
            return response()->json(['status' => 'error', 'message' => 'Invalid credentails'], 401);
        }
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($credentials);
        return response()->json([
            'user' => $user
        ]);
    }

}
