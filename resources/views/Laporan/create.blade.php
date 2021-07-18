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
<div align="left">
 <a href="{{ route('data-homestay-user.index') }}" class="btn btn-primary">Kembali</a>
</div>
<br />
 <br />
 <br />
<h2 align="center">Form Laporan Homestay</h2>
<br />
<form method="post" action="{{ route('laporan.store') }}" enctype="multipart/form-data">

	@csrf
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
	<div class="form-group" align="center">
  <label class="col-md-4">Unggah Foto</label>
  <div class="col-md-8">
    <img id="blah" src="http://placehold.jp/225x175.png" alt="your image" width="225px" height="175px" class="padtop"/>
    <div class="form-group txt padbot">Unggah foto laporan*</div>
    <div class="fileUpload btn btn-orange pad panjangbtn">
   <input type="file" name="image" onchange="readURL(this);"  accept=".jpg,.jpeg,.png"/>
  </div>
  <script type="text/javascript">                        
                              function readURL(input) {
                                  if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                      $('#blah')
                                        .attr('src', e.target.result);
                                    };    

                                  reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary btn-lg input-lg" value="Tambah" />
	</div>
</form>
@endsection