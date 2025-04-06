<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ValidateResource
{
    public function handle(Request $request, Closure $next): Response
    {
        // Obtém todas as rotas registradas e converte para um formato comparável
        $validRoutes = collect(Route::getRoutes())->map(function ($route) {
            return preg_replace('/\{[^}]+\}/', '*', trim($route->uri(), '/'));
        });

        // Converte a URL solicitada para o mesmo formato, mas tratando ID de MongoDB (24 caracteres alfanuméricos)
        $requestedRoute = preg_replace('/\/[0-9a-fA-F]{24}/', '/*', trim($request->path(), '/'));

        // Converte IDs numéricos para * (como '1', '123')
        $requestedRoute = preg_replace('/\/\d+/', '/*', $requestedRoute);

        if (! $validRoutes->contains($requestedRoute)) {
            return response()->json([
                'error' => 'Recurso não encontrado.',
                'message' => "O recurso '$requestedRoute' não é válido. Tente um dos seguintes: ".$validRoutes->implode(', '),
            ], 404);
        }

        return $next($request);
    }
}
