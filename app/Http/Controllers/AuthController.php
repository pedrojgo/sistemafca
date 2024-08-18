<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
    
        $minutes = 60;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('token', $token, $minutes));
    
        return redirect()->route('homeView')->withCookie(cookie('token', $token, $minutes));
    }
    

    public function logout()
    {
        Cookie::queue(Cookie::forget('token'));

        $response = new Response('Logged out');
        $response->withCookie(cookie('token', '', -1));

        return redirect('/login');
    }
}
