<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $keyType = "string";
    protected $primaryKey = "kode_soal";
    public $incementing = false;

    protected $fillable = ['kode_soal', 'kode_judul_soal', 'pertanyaan', 'pilihan1', 'pilihan2', 'pilihan3', 'pilihan4', 'pilihan5', 'pilihan_benar'];

    public $timestamps = false;

    public function soal_pilihan()
    {
        return $this->hasMany('App\Soal_pilihan');
    }
    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
    public function soal_judul()
    {
        return $this->belongsTo('App\Soal_judul', "kode_judul_soal");
    }
}
