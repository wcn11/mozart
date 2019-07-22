<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor_pelajaran;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function index()
    {
        $mp = Mentor_pelajaran::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->get();

        // foreach ($mp as $m) {
        //     echo $m->mp_js;
        // }

        return view("mentor.pages.mapel.index", compact("mp"));
    }
}
