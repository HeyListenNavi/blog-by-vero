<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($banUntil = $request->session()->get('banned_until')) {
            if (now()->lessThan($banUntil)) {
                return response()->view('banned', ['banUntil' => $banUntil], 403);
            } else {
                $request->session()->forget('banned_until');
            }
        }

        return $next($request);
    }
}
