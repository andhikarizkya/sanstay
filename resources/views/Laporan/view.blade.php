@extends('parent')

@section('main')
<br />
<div class="jumbotron text-center">
	<div align="left">
		<a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
	</div>
	<br />
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail"/>
	<h3>Nama Homestay	=	{{ $data->nama_homestay }}</h3>
	<h3>Deskripsi  		=	{{ $data->deskripsi }}</h3>
</div>
@endsection