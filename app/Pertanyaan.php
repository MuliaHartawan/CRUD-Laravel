<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //field yang bisa di diisi
    protected $fillable =['judul', 'isi_pertanyaan'];
}
