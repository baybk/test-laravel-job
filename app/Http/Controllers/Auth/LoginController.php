<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->api_token =  $user->createToken('APPLICATION')->accessToken;
            return $this->sendSuccess(
                [
                    'user' => $user
                ],
                __('auth.login_success')
            );
        }

        return $this->sendError(
            [
                'error' => __('auth.un_authenticated')
            ],
            __('auth.un_authenticated')
        );
    }

    public function logout(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $token = Auth::guard('api')->user()->token()->revoke();
            return $this->sendSuccess(
                ['data' => __('auth.logout_success')],
                __('auth.logout_success')
            );
        }
        return $this->sendSuccess(
            ['state' => 1],
            __('auth.logout_success')
        );
    }
}
