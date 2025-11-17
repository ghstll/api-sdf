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

class JwtMiddlewareDocente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
          Auth::shouldUse('docentes');
          $docente = JWTAuth::parseToken()->authenticate();
          if(!$docente){
            return response()->json(["message" => "Docente no encontrado"]);
          } 
        }catch(JWTException $e){
          return response()->json(["message" => "Token no encontrado"],401);
        }
        return $next($request);
    }
}
