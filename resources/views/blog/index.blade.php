@extends('layouts.app')

@section('content')
	<div class="jumbotron jumbotron-fluid header-bg">
	  <div class="container">
	    <h1 class="display-4">Моят блог</h1>
	    <p class="lead">Това е моят блог</p>
	  </div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col col-2">
			</div>
			<div class="col col-8">
				@foreach($posts as $post)
					<h1><a href="{{asset('post/'.$post->id)}}">{{$post->title}}</a></h1>
					<p>{{ substr($post->content,0,500)}}</p>

				@endforeach
				{{ $posts->links() }}
			</div>
			<div class="col col-2">
			</div>
		</div>
	</div>
@endsection