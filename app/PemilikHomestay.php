<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemilikHomestay extends Model
{
    protected $table ='data_homestay';
    protected $fillable = ['nama_homestay', 'no_telpon', 'harga', 'alamat', 'wilayah', 'kamar','deskripsi', 'image'];
    public $timestamps =true;
}
