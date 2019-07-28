<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Mentor;
use App\Student;
use App\Materi;
use App\Soal_judul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Master;
use Illuminate\Http\Request;
use App\Pelajaran;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $redirectTo = '/master/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('master.auth:master');
    }

    /**
     * Show the Master dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = Mentor::all();
        $student = Student::all();
        $materi = Materi::all()->count();
        $soal = Soal_judul::all()->count();

        return view('master.home', compact("mentor", "student", "materi", "soal"));
    }

    public function changePassword(Request $request)
    {
        $current_password =  Auth::guard('master')->user()->password;
        if ($request->current_password == "") {
            return array("status_password" => "kosong");
        } elseif ($request->password_baru == "") {
            return array("status_password" => "kosong");
        } elseif ($request->password_confirmation == "") {
            return array("status_password" => "kosong");
        } else {

            if (Hash::check($request->current_password, $current_password)) {

                if ($request->password_baru === $request->password_confirmation) {

                    if ((Hash::check($request->password_baru, $current_password))) {
                        return array("status_password" => "password_sama_dengan_lama"); //benars
                    } else {
                        $user_id = Auth::guard('master')->user()->username;
                        $user = Master::find($user_id);
                        $user->password = Hash::make($request->password_baru);
                        $user->save();
                        return array("status_password" => "berhasil");
                    }
                } else {
                    return array("status_password" => "konfirmasi_tidak_sama");
                }
            } else {
                return array("status_password" => "salah");
            }
        }
    }

    public function mapel()
    {
        $mapel = Pelajaran::all();

        return view("master.mapel", compact("mapel"));
    }

    public function tambah_mapel(Request $request)
    {
        $mapel = $request->mapel;

        $mpl_max = Pelajaran::max("kode_mapel");

        $mpl_max_slash = strrpos($mpl_max, "-");

        $mpl_max_substr = substr($mpl_max, $mpl_max_slash + 1) + 1;

        // echo $mpl_max_substr;

        Pelajaran::create([
            'kode_mapel' => "MPL-" . $mpl_max_substr,
            'nama_pelajaran' => $mapel
        ]);

        Session::flash("berhasil_tambah", "berhasil");

        return redirect()->back();

        // return view("master.mapel", compact("mapel"));
    }

    public function hapus_mapel($id)
    {
        $mapel = Pelajaran::find($id);

        $mapel->delete();

        Session::flash("mapel_terhapus", "terhapus");

        return redirect()->back();
    }

    public function update_mapel(Request $request)
    {
        $mapel = Pelajaran::find($request->kode_mapel);

        $mapel->nama_pelajaran = $request->mapel;

        $mapel->update();

        Session::flash("mapel_update", "updated");

        return redirect()->back();
    }
}
