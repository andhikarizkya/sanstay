@extends('parent')

@section('main')


@if($message = Session::get('sukses'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<br />
<h2 align="center">Data Laporan Homestay</h2>
<br />
<table class="table table-bordered table-hover">
 <tr>
  <th width="35%">Nama Homestay</th>
  <th width="35%">Deskripsi</th>
  <th width="35%">Date</th>
 </tr>
 @foreach($data as $row)
  <tr>
    <td> {{ $row->nama_homestay }} </td>
   <td>{{ $row->deskripsi }}</td>
   <td>{{ $row->created_at }}</td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection