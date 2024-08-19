<?php
namespace App\Http\Middleware;

use Closure;

class ApiMiddleware 
{
  
    public function handle($request, Closure $next)
    {
        $apiKey = $request->headers->get('apikey');
        $validApiKey = config('app.api_key');

        if ($apiKey === $validApiKey) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
