<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $keyType = "string";
    protected $primaryKey = "kode_mapel";
    public $incrementing = false;

    const CREATED_AT = 'dibuat';

    const UPDATED_AT = 'diupdate';

    protected $table = "pelajaran";

    protected $fillable = ['kode_mapel', 'id_mentor', 'nama_pelajaran', 'dibuat', 'diupdate'];



    public function mapel_ke_materi()
    {
        return $this->hasMany('App\Materi', "kode_mapel");
    }

    public function soal()
    {
        return $this->hasOne('App\Soal');
    }

    public function mentor()
    {
        return $this->belongsToMany('App\Mentor', "id_mentor");
    }

    public function soal_judul()
    {
        return $this->belongsTo('App\Soal_judul', "kode_mapel", "kode_mapel");
    }

    public function student()
    {
        return $this->belongsToMany('App\Student', "App\Pelajaran_student", "kode_mapel", "id_student");
    }

    public function pelajaran_student()
    {
        return $this->hasMany('App\Pelajaran_student', "kode_mapel");
    }

    public function mp_ke_mapel()
    {
        return $this->hasMany("App\Mentor_pelajaran", "kode_mapel");
    }

    public function mapel_ke_soal()
    {
        return $this->hasMany("App\Soal_judul", "kode_mapel");
    }
}
