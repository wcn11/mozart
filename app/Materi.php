<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";

    protected $fillable = ['kode_materi', 'kode_mentor_pelajaran', 'judul_materi', 'cover', 'materi'];

    protected $keyType = "string";
    protected $primaryKey = "kode_materi";
    public $incrementing = false;

    const CREATED_AT = "dibuat";

    const UPDATED_AT = "diupdate";

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel", "kode_mapel");
    }

    public function mentor_ke_materi()
    {
        return $this->belongsTo('App\Pelajaran', "id_mentor");
    }

    public function materi_ke_mentor()
    {
        return $this->belongsTo('App\Mentor', "id_mentor");
    }

    public function mp_ke_materi()
    {
        return $this->belongsTo('App\Mentors_student', "kode_mentor_pelajaran");
    }

    public function mapel_ke_materi()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel");
    }
}
