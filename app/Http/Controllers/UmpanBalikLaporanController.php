<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\umpan_balik;
use Illuminate\Support\Facades\DB;

class UmpanBalikLaporanController extends Controller
{
	public function index()
	{
		$data = \App\umpan_balik::all();
		$data = DB::table('umpan_balik')->orderBy('created_at', 'desc')->paginate(5);
		return view('hasil_laporan', ['data' => $data]);

	}

    public function save(Request $request)
    {
    	$data = new umpan_balik;
    	$data->nama_homestay = $request->nama_homestay;
    	$data->deskripsi = $request->deskripsi;
    	
    	echo $data->save();
    	return redirect('/laporan-umpan-balik');
    }
}
