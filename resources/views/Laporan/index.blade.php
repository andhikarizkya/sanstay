@extends('parent')

@section('main')


@if($message = Session::get('sukses'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<br />
<h2 align="center">Data Laporan Masyarakat</h2>
<br />
<table class="table table-bordered table-hover">
 <tr>
  <th width="30%">Nama Homestay</th>
  <th width="35%">Deskripsi</th>
  <th width="10%">Foto</th>
  <th width="35%">Aksi</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->nama_homestay }}</td>
   <td>{{ $row->deskripsi }}</td>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
   <td>
      <a href="{{ route('laporan.show', $row->id) }}" class="btn btn-primary">Lihat lebih detail</a>
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection