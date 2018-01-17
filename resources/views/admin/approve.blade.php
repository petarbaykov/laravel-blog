@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top:20px;">

		<h1>Одобряване на статии</h1>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Статия</th>
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
			      	
			      		<a href="{{asset('admin/user/'.$post->id)}}" class="btn btn-success">
			      			Одобри
			      		</a>
			      	
			      </td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

	</div>
	
@endsection