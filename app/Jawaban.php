<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    //Mendefisikan field tabel yang boleh diisi

    protected $fillable = ['isi_jawaban', 'pertanyaan_id'];
}
