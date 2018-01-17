@extends('layouts.app')

@section('content')

	<div class="container" style="margin-top:20px;">
		<h1>Коментари</h1>
		@if(Session::has('msg'))
			<div class="alert alert-success" role="alert">
				{{Session::get('msg')}}
			</div>
		@endif
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Статия</th>
		      <th scope="col">Коментар</th>
		      <th scope="col">Автор</th>
		      <th scope="col">Действие</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($comments as $comment)
		  		<tr>
			      <th scope="row">{{$comment->comment_id}}</th>
			      <td>{{$comment->title}}</td>
			       <td>{{$comment->comment}}</td>
			      <td>{{$comment->author}}</td>
			      <td>
			      	<a href="{{asset('delete-comment/'.$comment->comment_id)}}" class="btn btn-danger">Изтриване</a>
			      </td>
			    </tr>
			@endforeach
		  </tbody>
	</table>

	</div>
@endsection