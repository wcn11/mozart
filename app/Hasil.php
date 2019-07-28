<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = "hasil";
    protected $primaryKey = "kode_hasil";
    protected $keyType = "string";

    protected $fillable = ['kode_hasil', 'id_student', 'jawaban', 'kode_judul_soal'];

    public $timestamps = false;
}
