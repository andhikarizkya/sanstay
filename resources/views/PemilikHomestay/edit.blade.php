@extends('parent')

@section('main')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('data-homestay.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="{{ route('data-homestay.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group" align="center">
       <label class="col-md-4">Nama Homestay</label>
       <div class="col-md-8">
        <input type="text" name="nama_homestay" value="{{ $data->nama_homestay }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">No Telphone</label>
       <div class="col-md-8">
        <input type="tel" name="no_telpon" value="{{ $data->no_telpon }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Harga</label>
       <div class="col-md-8">
        <input type="text" name="harga" value="{{ $data->harga }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Alamat</label>
       <div class="col-md-8">
        <textarea type="text" name="alamat" class="form-control input-lg">{{ $data->alamat }}</textarea>
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
  <label class="col-md-4">Wilayah</label>
  <div class="col-md-8">
            <select class="form-control" name="wilayah" require>
              <option value="{{ $data->wilayah }}" disabled selected hidden>Daerah Istimewa Yogyakarta</option>
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
              <option value="{{ $data->kamar }}" disabled selected hidden>Jumlah Kamar</option>
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
        <textarea type="text" name="deskripsi" class="form-control input-lg">{{ $data->deskripsi }}</textarea>
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Unggah Foto</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

@endsection
