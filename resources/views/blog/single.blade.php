@extends('layouts.app')

@section('content')
		<div class="jumbotron jumbotron-fluid header-bg" style="background-image:url({{asset('blog-posts/'.$post->image)}});">
			  <div class="container">
			    <h1 class="display-4">{{$post->title}}</h1>
			    <p class="lead"></p>
			  </div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col col-2">
					</div>
					<div class="col col-8">
						{{$post->content}}
					</div>
					<div class="col col-2">
					</div>
				</div>
			</div>
	
		
	
@endsection