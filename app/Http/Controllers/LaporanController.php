<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Data_Homestay;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laporan::latest()->paginate(5);
        return view('Laporan.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_homestay'    => 'required',
            'deskripsi'        => 'required',
            'image'            => 'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama_homestay'          =>   $request->nama_homestay,
            'deskripsi'       =>   $request->deskripsi,
            'image'            =>   $new_name
        );

        Laporan::create($form_data);

        return redirect('laporan/create')->with('sukses', 'Data berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Laporan::findOrFail($id);
        return view('Laporan.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Laporan::findOrFail($id);
        return view('Laporan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'nama_homestay'    =>  'required',
                'deskripsi' =>  'required',
                'image'     =>  'image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'nama_homestay'    =>  'required',
                'deskripsi'    =>  'required'
            ]);
        }

        $form_data = array(
            'nama_homestay'          =>   $request->nama_homestay,
            'deskripsi'       =>   $request->deskripsi,
            'image'           =>   $image_name
        );
  
        Laporan::whereId($id)->update($form_data);

        return redirect('laporan')->with('sukses', 'Data berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Laporan::findOrFail($id);
        $data->delete();

        return redirect('laporan')->with('sukses', 'Data berhasil dihapus');
    }
}
