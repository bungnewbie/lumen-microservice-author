<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;

class AuthApiMiddleware
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $contentType = explode(',', 'application/json');
        $secretKey   = explode(',', env('SECRET_KEY'));
        if(
            in_array($request->header('Authorization'), $secretKey)
                                &&
            in_array($request->header('Content-Type'), $contentType)
        ) {
            return $next($request);
        }

        return ApiResponse::failed('Unauthorized', Response::HTTP_UNAUTHORIZED);
    }
}