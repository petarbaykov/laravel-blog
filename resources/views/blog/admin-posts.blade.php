@extends('layouts.app')

@section('content')
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
	      <th scope="col">Last</th>
	      <th scope="col">Действие</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($posts as $post)
	  		<tr>
		      <th scope="row">{{$post->id}}</th>
		      <td>{{$post->title}}</td>
		      <td>Otto</td>
		      <td>
		      	<a href="{{asset('edit/'.$post->id)}}" class="btn btn-success">Редактиране</a>
		      	<a href="{{asset('delete/'.$post->id)}}" class="btn btn-danger">Изтриване</a>
		      </td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
@endsection