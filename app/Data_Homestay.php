<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_Homestay extends Model
{
	protected $table = 'data_homestay';
    protected $fillable = ['nama_homestay', 'no_telpon', 'harga', 'alamat', 'wilayah', 'kamar','deskripsi', 'image'];
}
