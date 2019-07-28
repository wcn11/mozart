<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Tugas;
use App\Mentor;
use App\Student;
use App\Data;
use Yajra\DataTables\DataTables;
use App\Mentors_student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mentor_pelajaran;
use App\Pelajaran;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        $mapel = Pelajaran::all();

        return view('mentor.pages.student.index', compact('mentor', "mapel"));
    }

    public function getDataStudent()
    {
        $mentor_id = Auth::guard('mentor')->user()->id_student;


        // return Datatables::of(Mentor::all()->where('mentor_id', $mentor_id)->student)->make(true);
    }

    public function unfollow($id)
    {
        $std = Mentors_student::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->where("id_student", $id)->get();

        $std2 = Mentors_student::find($std[0]["kode_mengikuti"]);

        $std2->delete();

        Session::flash("berhasil_unfollow", "berhasil");

        return back();
    }

    public function update_kuota(Request $request)
    {

        $kuota = $request->kuota;

        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        $js = Mentor::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->get();

        if ($kuota < count($js)) {
            Session::flash("gagal_update_kuota", "gagal");

            return back();
        } else {
            $kmp = $request->kmp;

            $kode = Mentor_pelajaran::find($kmp);

            $kode->kuota = $request->kuota;

            $kode->save();

            Session::flash("berhasil_update_kuota", "berhasil");

            return back();
        }
    }

    public function hapus_mapel(Request $req)
    {
        $kmp = $req->kmp;

        $mp = Mentor_pelajaran::find($kmp);

        $mp->delete();

        Session::flash("berhasil_mp", "berhasil");

        return redirect()->back();
    }


    public function addItem(Request $request, $id)
    {
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            $data = new Data();
            $data->name = $request->name;
            $data->save();
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {


        $std = Mentors_student::find($req->kode_mengikuti);

        $std->delete();

        Session::flash("berhasil_dikeluarkan", 'Murid berhasil dikeluarkan');

        return redirect()->back();
    }
}
