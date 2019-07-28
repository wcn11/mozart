<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentors_student extends Model
{
    protected $table = 'mentor_student';

    protected $fillable = ['kode_mentor_student', 'id_mentor', 'id_student', 'tanggal_mengikuti'];

    protected $primaryKey = "kode_mentor_student";
    protected $keyType = "string";
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student', "id_student", "id_student");
    }

    public function mp_ke_ms()
    {
        return $this->hasMany('App\Mentor_pelajaran', "kode_mentor_pelajaran");
    }
    public function m_ke_ms()
    {
        return $this->belongsTo('App\Mentor', "id_mentor");
    }

    public function s_ke_ms()
    {
        return $this->belongsTo('App\Student', "id_student");
    }

    public function ms_ke_mp()
    {
        return $this->hasMany('App\Mentor_pelajaran', "kode_mentor_pelajaran");
    }
}
