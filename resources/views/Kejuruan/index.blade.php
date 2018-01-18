@extends('layouts.app')
@section('content')
<div class="container">

<div class=-"row">
		<center><h1>Kejuruan</h1></center>
		<div class="panel panel-primary">
		<div class ="panel-heading">Kejuruan
		<div class="panel-title pull-right"><a href="/admin/kejuruan/create"> Tambah Data </a></div></div>
		
		<div class="panel-body"></div>
		<table class="table">
				<thead>
			<tr>
				<th>Nama</th>
				<th>profil</th>
				<th>Gambar</th>
				<th colspan="3">Action</th>
			</tr>
			</thead>
			<body>
					@foreach($kejuruan as $data)
					<tr>
						<td>{{$data->nama}}</td>
						<td>{{$data->profil}}</td>
						<td>
							<src type="submit">
								<a href="{{ route('kejuruan.index') }}"><img src="{{asset('/img/'.$data->cover.'')}}" height="100px" width="100px"></a></button>
						</td><td>
							<a class="btn btn-warning" href="/admin/kejuraun/{{$data->id}}/edit">Edit</a>
						</td>
			
					
						
						
						<td>
						<form action="{{route('kejuruan.destroy',$data->id)}}" method="post">
							
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
