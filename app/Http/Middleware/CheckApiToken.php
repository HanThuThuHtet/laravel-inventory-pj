<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check
        if(!$request->has('token')){
            return response()->json(["message" => "Unauthorized Access.Api Token required."],401);
        }elseif($request->token != "htth"){
            return response()->json(["message" => "Invalid Api Token."],401);
        }

        //pass
        return $next($request);
    }
}
