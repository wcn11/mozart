<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal_judul extends Model
{
    protected $table = "judul_soal";

    protected $keyType = "string";
    protected $primaryKey = "kode_judul_soal";
    public $incrementing = false;

    protected $fillable = ['kode_judul_soal', 'kode_mentor_pelajaran', 'tanggal_mulai', 'tanggal_selesai', 'jumlah_soal'];

    const CREATED_AT = "dibuat";

    const UPDATED_AT = "diupdate";

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel", "kode_mapel");
    }

    public function mentor()
    {
        return $this->belongsTo('App\Mentor', "kode_judul_soal");
    }

    public function soal_judul()
    {
        return $this->hasMany('App\Soal', "kode_judul_soal");
    }

    public function js_ke_n()
    {
        return $this->hasMany('App\Nilai', "kode_judul_soal");
    }
    public function kjs_ke_mentor()
    {
        return $this->hasMany("App\Mentor", "id_mentor", "id_mentor");
    }

    public function mp_js()
    {
        return $this->belongsTo('App\Mentor_pelajaran', "kode_mentor_pelajaran");
    }

    public function mapel_ke_soal()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel");
    }

    public function mp_ke_js()
    {
        return $this->belongsTo('App\Mentor_pelajaran', "kode_mentor_pelajaran");
    }
}
