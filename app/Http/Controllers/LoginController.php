<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try
        {

            $message =  "";
            $status = 1;
            if(!User::where('email', $request->email)->exists())
            {
                return [
                    "status"=>0,
                    "message"=>"User does not exist.",
                ];
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                $user = User::where('email', $request->email)->first();
                $access_token =  $user->createToken('My Token',['*'])->accessToken;
                $expiration = now()->addDays(30)->toDateTimeString();
                $permissions = $user->allPermissions()->pluck('name')->toArray();
            }else{
                throw new \Exception("RM Module: User not active/found in AD");
            }

        }catch (\Exception $e)
        {
            logger($e);
            $status = 0;
            $message = "Invalid Credentials";
            $user = "";
            $access_token = "";
            $expiration = "";
            $permissions = [];
        }
        return [
            'status' => $status,
            'message' => $message,
            'user' => $user,
            'access_token' => $access_token,
            'permissions' => $permissions,
            'expiration' => $expiration,
        ];
    }
}
