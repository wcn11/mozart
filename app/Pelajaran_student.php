<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran_student extends Model
{
    protected $table = "pelajaran_student";

    protected $fillable = ["kode_join_pelajaran_student", "id_mentor", "id_student", "kode_mapel"];

    public $timestamps = false;

    public function pelajaran_student()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel");
    }
}
