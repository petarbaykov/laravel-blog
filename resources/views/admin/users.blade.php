@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top:20px;">
		<h1>Добавяне на автори във блога</h1>
		@if(Session::has('msg'))
			<div class="alert alert-success" role="alert">
				{{Session::get('msg')}}
			</div>
		@endif
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Потребител</th>
		      <th scope="col">Действие</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
		  		<tr>
			      <th scope="row">{{$user->id}}</th>
			      <td>{{$user->email}}</td>
			      <td>
			      	
			      		<a href="{{asset('admin/user/'.$user->id)}}" class="btn btn-success">
			      			@if($user->role == "author")
			      				Премахни автор
			      			@else
			      				Направи автор
			      			@endif
			      		</a>
			      	
			      </td>
			    </tr>
			@endforeach
		  </tbody>
		</table>
	</div>
	
@endsection