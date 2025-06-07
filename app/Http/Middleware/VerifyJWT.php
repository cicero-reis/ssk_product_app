<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyJWT
{
    public function handle($request, Closure $next)
    {
        try {
            $payload = JWTAuth::parseToken()->getPayload();

            $clientId = $payload->get('client_id');
            $userId = $payload->get('user_id');
            $role = $payload->get('role');
            $email = $payload->get('email');

            // Salvar no request para acessar depois
            $request->attributes->add([
                'user_id' => $userId,
                'role' => $role,
                'email' => $email,
                'client_id' => $clientId,
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token inválido ou não fornecido'], 401);
        }

        return $next($request);
    }
}
