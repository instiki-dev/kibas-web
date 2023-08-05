<?php

namespace App\Http\Middleware;

use App\Models\Rekening;
use Closure;
use Illuminate\Http\Request;

class EnsureRekeningandUserSame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $rekening = $request -> route("rekening");
        if (!$rekening) {
            return response([
                "message" => "No rekening tidak tersedia"
            ], 404);
        }
        $pelanggan = auth('sanctum') -> user() -> pelanggan;
        if ($rekening -> pelanggan_id != $pelanggan -> id) {
            return response([
                "message" => "Akses dilarang"
            ], 401);
        }
        return $next($request);
    }
}
