@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:20px">
	<h1>Статии в блога</h1>
	@if(Session::has('msg'))
		<div class="alert alert-success" role="alert">
			{{Session::get('msg')}}
		</div>
	@endif
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Име на статия</th>
	      <th scope="col">Автор</th>
	      <th scope="col">Действие</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($posts as $post)
	  		<tr>
		      <th scope="row">{{$post->id}}</th>
		      <td>{{$post->title}}</td>
		      <td>{{$post->author}}</td>
		      <td>
		      	<a href="{{asset('edit/'.$post->id)}}" class="btn btn-success">Редактиране</a>
		      	<a href="{{asset('delete/'.$post->id)}}" class="btn btn-danger">Изтриване</a>
		      	@if(Auth::user()->role == "admin")
		      		@if($post->approved == 0 && $post->author != Auth::user()->email)
		      			<a href="{{asset('admin/approve/'.$post->id)}}" class="btn btn-primary">Одобри</a>
		      		@endif
		      	@endif
		      </td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
</div>
@endsection