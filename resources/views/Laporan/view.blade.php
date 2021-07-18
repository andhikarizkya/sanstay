@extends('parent')

@section('main')

<div class="jumbotron text-center">
	<div align="left">
		<a href="{{ route('laporan.index') }}" class="btn btn-default">Kembali</a>
	</div>
	<br />
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail"/>
	<h3>Nama Homestay	=	{{ $data->nama_homestay }}</h3>
	<h3>Deskripsi  		=	{{ $data->deskripsi }}</h3>
</div>
@endsection