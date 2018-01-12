@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:20px;">
	<h1>Редактиране на статия: {{$post->title}}</h1>
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
	  <div class="form-group">
	    <label for="exampleInputEmail1">Снимка</label>
	    <input type="file" class="form-control" name="image">
	   
	  </div>
	  <input type="hidden" value="{{$post->id}}" name="id">
	  <button type="submit" class="btn btn-lg btn-block btn-primary">Запиши</button>
	</form>
</div>
@endsection