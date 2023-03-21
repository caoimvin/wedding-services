<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'access_name' => ['required', 'string'],
            'access_code' => ['required', 'string']
        ]);

        // check access_name
        $invitation = Invitation::where('access_name', $request['access_name'])->first();

        // check access_code
        if (!$invitation || !Hash::check($fields['access_code'], $invitation->access_code)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $invitation->createToken('invitationToken')->plainTextToken;

        $response = [
            'invitation' => $invitation,
            'token' => $token
        ];

        return response($response, 201);
    }
}
