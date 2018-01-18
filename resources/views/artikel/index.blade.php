@extends('layouts.app')
@section('content')
<div class="container">

<div class=-"row">
		<center><h1>Data artikel</h1></center>
		<div class="panel panel-primary">
		<div class ="panel-heading">Data artikel
		<div class="panel-title pull-right"><a href="/admin/artikel/create"> Tambah Data </a></div></div>
		
		<div class="panel-body"></div>
		<table class="table">
				<thead>
			<tr>
				<th>Id</th>
				<th>Tanggal</th>
				<th>Judul</th>
				<th>Koten</th>
				<th>Cover</th>
				<th colspan="3">Action</th>
			</tr>
			</thead>
			<body>
					@foreach($artikel as $data)
					<tr>
						<td>{{$data->tgl}}</td>
						<td>{{$data->judul}}</td>
						<td>{{$data->konten}}</td>
						<td>{{$data->cover}}</td>
						<td>
							<button type="submit">
								<a href="{{ route('artikel.index') }}">
									<img src="{{asset('/img/'.$data->cover.'')}}" height="100px" width="100px"></a></button>
						</td><td>
							<a class="btn btn-warning" href="/admin/artikel/{{$data->id}}/edit">Edit</a>
						</td>
			
					
						
						
						<td>
						<form action="{{route('artikel.destroy',$data->id)}}" method="post">
							
							
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" >
							<input type="submit" class="btn btn-danger" value="delete">
							{{csrf_field()}}
						</form>
					</td>

					</tr>
					@endforeach
			</body>

		

		
		</div>
</div>


@endsection
