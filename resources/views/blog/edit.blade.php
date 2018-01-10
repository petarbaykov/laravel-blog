@extends('layouts.app')

@section('content')
	@if(Session::has('msg'))
		<div class="alert alert-success" role="alert">
			{{Session::get('msg')}}
		</div>
	@endif
	<form action="{{asset('postEdit')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Заглавие</label>
	    <input type="text" class="form-control" name="title" value="{{$post->title}}">
	   
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Сдържание</label>
	    <textarea class="form-control" name="content" >{{$post->content}}</textarea>
	  </div>
	  <input type="hidden" value="{{$post->id}}" name="id">
	  <button type="submit" class="btn btn-primary">Запиши</button>
	</form>
	
@endsection