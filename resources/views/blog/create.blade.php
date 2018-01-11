@extends('layouts.app')

@section('content')
	@if(Session::has('msg'))
		<div class="alert alert-success" role="alert">
			{{Session::get('msg')}}
		</div>
	@endif
	<form action="{{asset('postCreate')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Заглавие</label>
	    <input type="text" class="form-control" name="title">
	   
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Сдържание</label>
	    <textarea class="form-control" name="content"></textarea>
	  </div>
	    <div class="form-group">
	    <label for="exampleInputEmail1">Снимка</label>
	    <input type="file" class="form-control" name="image">
	   
	  </div>
	  <button type="submit" class="btn btn-primary">Запиши</button>
	</form>
	
@endsection