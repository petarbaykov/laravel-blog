@extends('layouts.app')

@section('content')
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
	  	<?php $posts_counter = 1;?>
	  	@foreach($posts as $post)
	  		<tr>
		      <th scope="row">{{$posts_counter}}</th>
		      <td>{{$post->title}}</td>
		      <td>Otto</td>
		      <td>
		      	<a href="{{asset('edit/'.$post->id)}}" class="btn btn-success">Редактиране</a>
		      	<a href="{{asset('delete/'.$post->id)}}" class="btn btn-danger">Изтриване</a>
		      </td>
		    </tr>
		    <?php $posts_counter++; ?>
		@endforeach
	  </tbody>
	</table>
	
@endsection