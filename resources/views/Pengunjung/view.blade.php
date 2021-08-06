@extends('parent')

@section('main')
<br />
<div class="jumbotron text-center">
 <div align="left">
  <a href="{{ route('data-homestay-user.index') }}" class="btn btn-secondary">Kembali</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" witdh="175px" height="125px"/>
 <h3>Nama Homestay : {{ $data->nama_homestay }} </h3>
 <h3>No Telephone : {{ $data->no_telpon }}</h3>
 <h3>Harga : Rp. {{ number_format($data->harga) }} </h3>
 <h3>Alamat : {{ $data->alamat }}</h3>
 <h3>Wilayah : {{ $data->wilayah }}</h3>
 <h3>Jumlah Kamar : {{ $data->kamar }}</h3>
 <h3>Deskripsi : {{ $data->deskripsi }} </h3>
 <br>
  <a href="{{ route('laporan.create') }}" class="btn btn-danger">Laporkan</a>
</div>
@endsection