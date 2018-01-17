@extends('layouts.app')

@section('content')

	<div class="container" style="margin-top:20px;">
		<h1>Коментари</h1>

		@foreach($comments as $comment)
			{{$comment->comment}}

		@endforeach
	</div>
@endsection