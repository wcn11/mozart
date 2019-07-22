<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor_pelajaran extends Model
{

    protected $table = "mentor_pelajaran";

    protected $keyType = "string";

    protected $primaryKey = "kode_mentor_pelajaran";

    public $incrementing = false;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_mentor_pelajaran', 'id_mentor', 'kuota', "kode_mapel", "tanggal_buat"
    ];

    public function mentor_ke_mapel()
    {
        return $this->belongsTo("App\Pelajaran", "kode_mapel");
    }

    public function mp_ke_ms()
    {
        return $this->hasMany("App\Mentors_student", "kode_mentor_pelajaran");
    }

    public function mp_js()
    {
        return $this->hasMany('App\Soal_judul', "kode_mentor_pelajaran");
    }

    public function mp_mtri()
    {
        return $this->hasMany('App\Materi', "kode_mentor_pelajaran");
    }
}
