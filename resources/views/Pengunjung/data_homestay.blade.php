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

				@foreach($data as $row)
				<div class="col-md-4">
				<div class="card">
  				<img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="card-img-top" alt="...">
  				<div class="card-body">
    				<h5 class="card-title">{{ $row->nama_homestay }}</h5>
    				<p class="card-text">
    					<strong>Deskripsi :</strong> <br>
    					{{ $row->deskripsi }} <br>
    					<strong>Jumlah Kamar :</strong> {{ $row->kamar }} <br>
    					<strong>Harga :</strong> Rp. {{ number_format($row->harga) }} <br>
    					<hr>
    					<strong>Wilayah :</strong> {{ $row->wilayah }}
    				</p>
    				<a href="{{ route('data-homestay-user.show', $row->id) }}" class="btn btn-primary">Lihat lebih detail</a>
  				</div>
				</div>
				</div>
 			@endforeach
		{!! $data->links() !!}
			</div>
		</div>
	</div>
@endsection