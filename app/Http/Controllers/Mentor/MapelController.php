<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor_pelajaran;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;

class MapelController extends Controller
{
    public function index()
    {
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        $mapel = Pelajaran::all();

        return view("mentor.pages.mapel.index", compact("mentor", "mapel"));
    }

    public function tambah_mapel(Request $r)
    {
        $mapel1 = $r->mapel;
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $mapel_all = Mentor::find($id_mentor);

        foreach ($mapel_all->m_ke_mp as $m) {
            if ($m->kode_mapel == $mapel1) {
                Session::flash("sudah_ada", "ada");
                return redirect()->back();
                break;
            }
        }

        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        $mpl_slash = strrpos($mapel1, "-");

        $mpl_substr = substr($mapel1, $mpl_slash + 1);

        $mp_jumlah = Mentor_pelajaran::max("kode_mentor_pelajaran");

        $mp_jumlah_slash = strrpos($mp_jumlah, "-");

        $mp_jumlah_substr = substr($mp_jumlah, $mp_jumlah_slash + 1) + 1;

        $mp = new Mentor_pelajaran;

        $mp->kode_mentor_pelajaran = "MP-" . $mentor_substr . "-" . $mpl_substr . "-" . $mp_jumlah_substr;

        $mp->id_mentor = $id_mentor;

        $mp->kode_mapel = $mapel1;

        $mp->save();

        Session::flash("berhasil_tambah", "berhasil");

        return redirect()->back();
    }

    public function edit_kuota(Request $request)
    {
        $pelajaran = Mentor_pelajaran::find($request->kode_mp);

        $pelajaran->kuota = $request->kuota_baru;

        $pelajaran->update();

        Session::flash("kuota_berhasil", "berhasil");

        return redirect()->back();
    }

    public function hapus_mapel(Request $request)
    {
        $kmp = $request->kmp;
        $mapel = Mentor_pelajaran::find($kmp);

        $mapel->delete();

        Session::flash("pelajaran_dihapus", "Mata pelajaran berhasil dihapus");

        return redirect()->back();
    }
}
