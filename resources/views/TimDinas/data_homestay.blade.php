@extends('parent')

@section('main')

<br />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<div class="container">
		@if($message = Session::get('sukses'))
		<div class="alert alert-success">
  			<p>{{ $message }}</p>
		</div>
		@endif
		<div class="row">
			<div class="col-12">
				<h3 class="panel-title" align="center">Homestay yang terdata</h3>
				<br />
				<table class="table table-bordered table-hover">
  					<thead class="thead-dark">
 					<tr>
  					<th width="10%"><center>Nama Homestay</center></th>
  					<th width="10%"><center>No Telepon</center></th>
  					<th width="10%"><center>Harga</center></th>
  					<th width="15%"><center>Alamat Lengkap</center></th>
            <th width="15%"><center>Wilayah</center></th>
            <th width="10%"><center>Jumlah Kamar</center></th>
  					<th width="10%"><center>Deskripsi</center></th>
  					<th width="20%"><center>Foto</center></th>
  					<th width="35%"><center>Aksi</center></th>
 					</tr>
				</thead>
					 @foreach($data as $row)
						</tbody>
  							<tr>
   							<td><center>{{ $row->nama_homestay }}</center></td>
   							<td><center>{{ $row->no_telpon }}</center></td>
   							<td><center>Rp. {{ number_format($row->harga) }}</center></td>
   							<td><center>{{ $row->alamat }}</center></td>
							<td><center>{{ $row->wilayah }}</center></td>
							<td><center>{{ $row->kamar }}</center></td>
   							<td class="deskripsi"><center>{{ $row->deskripsi }}</center></td>
						<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" witdh="60px" height="60px" /></td>
						<td>
    					<form action="{{ route('data-homestay-dinas.destroy', $row->id) }}" method="post">
        					@csrf
        					@method('DELETE')
        					<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yankin ingin menghapus data tersebut?')">Hapus</button>
        					<a href="{{ route('data-homestay-dinas.show', $row->id) }}" class="btn btn-primary">Lihat lebih detail</a>
     					 </form>
   						</td>
 					</tr>
					</tbody>
 					@endforeach
				</table>
				{!! $data->links() !!}
			</div>
		</div>
	</div>
@endsection