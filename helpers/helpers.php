<?php

use Tymon\JWTAuth\Facades\JWTAuth;

if (!function_exists('authUser')) {
    function authUser()
    {
        try {
            $payload = JWTAuth::parseToken()->getPayload();
            return (object) [
                'client_id' => $payload->get('client_id'),
                // Pode adicionar outras claims se quiser
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}
