@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center><h1>artikel</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading"> artikel
		<div class="panel-title pull-right"><a href="{{URL::previous()}}">kembali</a>
		</div>
		</div>
		<div class="panel-body">
			<form action="{{route('artikel.update',$artikel->id)}}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="put">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label class="control-label">Tanggal</label>
				<input type="date" name="a" value="{{$artikel->tgl}}" class="form-control" required="">
			</div>
			
			<div class="form-group">
				<label class="control-label">Judul</label>
				<input type="text" name="b" value="{{$artikel->judul}}" class="form-control" required="">
			</div>
			
			

			<div class="form-group">
				<label class="control-label">Konten</label>
				<input type="text" name="c" value="{{$artikel->konten}}" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-label">cover</label>
				<input type="file" name="cover" class="form-control" required="" value="{{$artikel->cover}}"></input>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">simpan</button>
				<button type="reset" class="btn btn-danger">reset</button>
			</div>
			</form>
		</div>
		</div>
		</div>
		@endsection