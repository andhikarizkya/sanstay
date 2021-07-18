<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Laporan;
use App\Data_Homestay;

class Laporan extends Model
{
  protected $table = 'laporan';
	protected $fillable = ['nama_homestay', 'deskripsi', 'image'];
}
