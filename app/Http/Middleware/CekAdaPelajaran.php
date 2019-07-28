<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mentor_pelajaran;

class CekAdaPelajaran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::guard("mentor")->check()) {
        // $mp = Mentor_pelajaran::where('id_mentor', Auth::guard('mentor')->user()->id_mentor)->get();

        // if (count($mp) > 0) {
        //     Session::forget("pelajaran_kosong");
        // } else {
        //     Session::put("pelajaran_kosong", "kosong");
        //     return redirect()->route("mentor.mapel");
        // }
        // }
        return $next($request);
    }
}
