@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $errors)
		<li>{{ $errors }}</li>
		@endforeach
	</ul>
</div>
@endif
<br />
<h2 align="center">Form Beri Umpan Balik</h2>
<br />
<form method="POST" action="submit" enctype="multipart/form-data">

	@csrf
	<input type="hidden" name="nama" value="{{ Auth::user()->name }}">

	<div class="form-group" align="center">
		<label class="col-md-3">Nama Homestay</label>
		<div class="col-md-6">
			<input type="text" name="nama_homestay" class="form-control input-lg"/>
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group" align="center">
		<label class="col-md-3">Deskripsi</label>
		<div class="col-md-6">
			<input type="text" name="deskripsi" class="form-control input-lg"/>
		</div>
	</div>
	<br />
	<br />
	<br />
 	<div class="form-group text-center">
  		<input type="submit" name="add" class="btn btn-primary btn-lg input-lg" value="Kirim" />
	</div>
</form>
@endsection