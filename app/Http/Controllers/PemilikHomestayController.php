<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data_Homestay;
use Illuminate\Support\Facades\Auth;

class PemilikHomestayController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Data_Homestay::latest()->paginate(5);
        return view('PemilikHomestay.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PemilikHomestay.create');
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
            'nama_homestay'    =>  'required',
            'no_telpon'        =>  'required',
            'harga'            =>  'required',
            'alamat'           =>  'required',
            'wilayah'          =>  'required',
            'kamar'            =>  'required',
            'deskripsi'        =>  'required',
            'image'            =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama_homestay'    =>   $request->nama_homestay,
            'no_telpon'        =>   $request->no_telpon,
            'harga'            =>   $request->harga,
            'alamat'           =>   $request->alamat,
            'wilayah'          =>   $request->wilayah,
            'kamar'            =>   $request->kamar,
            'deskripsi'        =>   $request->deskripsi,
            'image'            =>   $new_name
        );

        Data_Homestay::create($form_data);

        return redirect('data-homestay')->with('success', 'Data Homestay berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data_Homestay::findOrFail($id);
        return view('PemilikHomestay.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data_Homestay::findOrFail($id);
        return view('PemilikHomestay.edit', compact('data'));
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
        if($image != '')
        {
            $request->validate([
                'nama_homestay'    =>  'required',
                'no_telpon'        =>  'required',
                'harga'            =>  'required',
                'alamat'           =>  'required',
                'wilayah'          =>  'required',
                'kamar'            =>  'required',
                'deskripsi'        =>  'required',
                'image'            =>  'required|image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'nama_homestay'    =>  'required',
                'no_telpon'        =>  'required',
                'harga'            =>  'required',
                'alamat'           =>  'required',
                'wilayah'          =>  'required',
                'kamar'            =>  'required',
                'deskripsi'        =>  'required'
            ]);
        }

        $form_data = array(
            'nama_homestay'    =>   $request->nama_homestay,
            'no_telpon'        =>   $request->no_telpon,
            'harga'            =>   $request->harga,
            'alamat'           =>   $request->alamat,
            'wilayah'          =>   $request->wilayah,
            'kamar'            =>   $request->kamar,
            'deskripsi'        =>   $request->deskripsi,
            'image'            =>   $image_name
        );
  
        Data_Homestay::whereId($id)->update($form_data);

        return redirect('data-homestay')->with('success', 'Data Homestay berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Data_Homestay::findOrFail($id);
        $data->delete();

        return redirect('data-homestay')->with('success', 'Data Homestay berhasil dihapus.');
    }

}
