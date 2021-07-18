@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<br />
<div align="left">
 <a href="{{ route('data-homestay.index') }}" class="btn btn-primary">Kembali</a>
</div>
<br />
 <br />
 <br />
<form method="post" action="{{ route('data-homestay.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group" align="center">
  <label class="col-md-4">Nama Homestay</label>
  <div class="col-md-8">
   <input type="text" name="nama_homestay" class="form-control input" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group" align="center">
  <label class="col-md-4">No Telphone</label>
  <div class="col-md-8">
   <input type="tel" name="no_telpon" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group" align="center">
  <label class="col-md-4">Harga</label>
  <div class="col-md-8">
   <input type="text" name="harga" class="form-control input-lg" placeholder="Rp." />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group" align="center">
  <label class="col-md-4">Alamat Lengkap</label>
  <div class="col-md-8">
   <textarea type="text" name="alamat" class="form-control input-lg"></textarea>
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group" align="center">
  <label class="col-md-4">Wilayah</label>
  <div class="col-md-8">
            <select class="form-control" name="wilayah" require>
              <option value=" " disabled selected hidden>Daerah Istimewa Yogyakarta</option>
              <option value="Kabupaten Sleman">Kabupaten Sleman</option>
              <option value="Kabupaten Bantul">Kabupaten Bantul</option>
              <option value="Kabupaten Gunung Kidul">Kabupaten Gunung Kidul</option>  
              <option value="Kota Yogyakarta">Kota Yogyakarta</option> 
              <option value="Kabupaten Kulon Progo">Kabupaten Kulon Progo</option>   
            </select>
    </div>
  </div>
  <br />
  <br />
  <br />
  <div class="form-group" align="center">
  <label class="col-md-4">Jumlah kamar</label>
  <div class="col-md-8">
            <select class="form-control" name="kamar" require>
              <option value=" " disabled selected hidden>Jumlah Kamar</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>  
              <option value="4">4</option> 
              <option value="5">5</option>   
              <option value="6">6</option>   
            </select>
    </div>
  </div>
  <br />
  <br />
  <br />
 <div class="form-group" align="center">
  <label class="col-md-4">Deskripsi</label>
  <div class="col-md-8">
   <textarea type="text" name="deskripsi" class="form-control input-lg"></textarea>
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group" align="center">
  <label class="col-md-4">Unggah Foto</label>
  <div class="col-md-8">
    <img id="blah" src="http://placehold.jp/225x175.png" alt="your image" width="225px" height="175px" class="padtop"/>
    <div class="form-group txt padbot">Unggah foto homestay*</div>
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
