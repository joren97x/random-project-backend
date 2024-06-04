<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request) {

        // ge validate una niya kung naa bay email ug password
        $credentials  = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // unya ge pangita ang user sa katong gipadala nga email gikan sa frontend
        $user = User::where('email', $credentials['email'])->first();

        // if walay user then mo return ug invalid credentials
        // or if naay user unya dili mao ang password then mo return ug invalid credentials
        if(!$user || !Hash::check($credentials['password'], $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // if naay user nya sakto ra ang password
        // mo create shag token
        $token = $user->createToken('myapptoken')->plainTextToken;

        // then e return niya ang data sa user ug ang token
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);

    }

    public function register(Request $request) {

        // ge validate una niya kung naa bay email, name ug password
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => 'required',
            'password' => 'required'
        ]);

        // dire kay nag insert siyag user sa database
        $user = User::create([
            'email' => $credentials['email'],
            'name' => $credentials['name'],
            'password' => bcrypt($credentials['password'])
        ]);

        // then naghimog token
        $token = $user->createToken('myapptoken')->plainTextToken;

        // then e return niya ang data sa user ug ang token
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function getAuth() {
        return Auth::user();
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return ['message' => 'Logged out'];
    }

}
