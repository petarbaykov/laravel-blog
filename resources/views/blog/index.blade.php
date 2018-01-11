@extends('layouts.app')

@section('content')
	
	@foreach($posts as $post)
		<h1><a href="{{asset('post/'.$post->id)}}">{{$post->title}}</a></h1>
		<p>{{$post->content}}</p>

	@endforeach
@endsection