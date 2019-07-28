<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Support\Facades\Auth;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use DOMPDF;
use App\Mentor;

class MateriController extends Controller
{
    public function __construct()
    {
        $this->middleware('mentor.cek_mapel');
    }

    public function index()
    {
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $mentor = Mentor::find($id_mentor);

        return view('mentor.pages.materi.daftar_materi', ['mentor' => $mentor]);
    }

    public function tambah_materi(Request $request)
    {
        $kode_mapel = $request->kode_mapel;

        $mapel = Pelajaran::find($kode_mapel);

        $kmp = $request->kmp;

        return view("mentor.pages.materi.materi_upload", compact("kode_mapel", "mapel", "kmp"));
    }

    public function ambil_data($kode_materi)
    {
        $materi = Materi::find($kode_materi);

        return response()->json($materi);
    }


    public function materi_upload_aksi(Request $r)
    {
        $m = Materi::max("kode_materi");
        $m_slash = strrpos($m, "-");
        $s = substr($m, $m_slash + 1) + 1;

        $pesan = [
            'required' => ":attribute harus diisi (Gambar/Cover)"

        ];

        $this->validate($r, [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], $pesan);

        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        //ambil lalu slash lalu substr id mentor
        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        //ambil lalu slash lalu substr kode mapel

        $mapel_slash = strrpos($r->kode_mapel, '-');

        $mapel_substr = substr($r->kode_mapel, $mapel_slash + 1);

        //masukkan ke database

        $materi = new Materi;

        $materi->kode_materi = "MTRI-" . $mentor_substr . "-" . $mapel_substr . '-' . $s;

        $materi->judul_materi = $r->judul;

        $materi->id_mentor = $id_mentor;

        $materi->kode_mentor_pelajaran = $r->kmp;

        $materi->kode_mapel = $r->kode_mapel;

        if ($r->has('cover')) {

            $file = $r->file('cover');

            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images/cover_materi/';
            $file->move($tujuan_upload, $nama_file);

            $materi->cover = $nama_file;
        }

        $materi->materi = $r->materi;

        $materi->save();

        Session::flash('success_upload_materi', 'Upload materi, berhasil!');

        return redirect()->route("mentor.materi");
    }

    public function materi_edit($kode_materi)
    {

        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        // $pelajaran = Pelajaran::where("id_mentor", $id_mentor)->get();

        $materi = Materi::find($kode_materi);

        return view('mentor.pages.materi.materi_edit', ["m" => $materi]);
    }

    public function materi_update(Request $r)
    {
        $materi_id = Crypt::decrypt($r->kode_materi);

        $materi = Materi::find($materi_id);

        $materi->judul_materi = $r->judul;

        $materi->kode_mapel = $r->kode_mapel;

        if ($r->has('cover')) {

            $file = $r->file('cover');

            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images/cover_materi/';
            $file->move($tujuan_upload, $nama_file);

            $materi->cover = $nama_file;
        }

        $materi->materi = $r->materi;

        $materi->save();

        Session::flash('success_update_materi', 'Update materi, berhasil!');

        return redirect()->route("mentor.materi");
    }

    public function hapus_materi(Request $request)
    {
        $materi_id = $request->kode_materi;

        $materi = Materi::find($materi_id);

        $materi->delete();

        Session::flash('hapus_materi', "Berhasil hapus materi");

        return redirect()->route("mentor.materi");
    }

    public function downloadPDF($id)
    {
        // $materi_id = Crypt::decrypt($id);
        $materi = Materi::find($id);

        $pdf = DOMPDF::loadView('mentor.pages.materi.pdf', compact('materi'));

        return $pdf->download($materi->judul_materi . '.pdf');
    }
}
