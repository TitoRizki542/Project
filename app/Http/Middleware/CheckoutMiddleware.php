<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pesanan;

class CheckoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route()->id;
        $pesanan = Pesanan::whereId($id)->whereStatus('lunas')->exists();

        if ($pesanan) {
            return redirect()->route('wisata.index');
        }

        return $next($request);
    }
}
