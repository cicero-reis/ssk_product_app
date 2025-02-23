<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ValidateResource
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validRoutes = collect(Route::getRoutes())->map(fn ($route) => trim($route->uri(), '/'));
        $requestedRoute = trim($request->path(), '/');

        if (! $validRoutes->contains($requestedRoute)) {
            return response()->json([
                'error' => 'Recurso não encontrado.',
                'message' => "O recurso '$requestedRoute' não é válido.",
            ], 404);
        }

        return $next($request);
    }
}
