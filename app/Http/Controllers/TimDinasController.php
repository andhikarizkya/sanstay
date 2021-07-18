<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_Homestay;

class TimDinasController extends Controller
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
    public function index()
    {
        $data = Data_Homestay::latest()->paginate(5);
        return view('TimDinas.data_homestay', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('TimDinas.view', compact('data'));
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

        return redirect('data-homestay-dinas')->with('success', 'Data Homestay berhasil dihapus.');
    }
}
