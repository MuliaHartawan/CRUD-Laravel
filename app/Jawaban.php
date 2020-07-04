<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    //Mendefisikan field tabel yang boleh diisi

    protected $fillabel = ['isi', 'pertanyaan_id'];
    // protected $guard = ['id', 'numbers', 'updated_at', 'created_at'];
}
