<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , ...$roles): Response
    {
        try{
          Auth::shouldUse('users');
          $user = JWTAuth::parseToken()->authenticate();
          if(!$user){
            return response()->json(["message" => "Usuario no encontrado"]);
          } 
          if(!empty($roles) && !in_array($user->rol,$roles)){
            return response()->json([
              'message' => 'Rol no autorizado'
            ],403);
          }
        }catch(JWTException $e){
          return response()->json(["message" => "Token no encontrado"],401);
        }
        return $next($request);
    }
}
