<?php
namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authenticate
{
  
    public function handle($request, Closure $next)
    {
        if ($request === null) {
            return response()->json(['error' => 'Request is null'], 500);
        }
        
        $token = $request->cookie('token');
        if ($token) {
            try {
                JWTAuth::setToken($token);

                if (JWTAuth::parseToken()->authenticate()) {
                    return $next($request);
                }
            } catch (JWTException $e) {
                return redirect('/login'); 
            }
        }

        return redirect('/login'); 
    }
}
