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
				<div class="row">
					<div class="col col-2">
					</div>
					<div class="col col-8">
						@if(Session::has('msg'))
							<div class="alert alert-success" role="alert">
								{{Session::get('msg')}}
							</div>
						@endif
						@if(Auth::check())
							<h1>Добавяне на коментари</h1>

							<form action="{{asset('post-comment')}}" method="post">
								
								{{csrf_field()}}
								<textarea name="comment"></textarea>
								<input type="submit" name="" value="Коментирай">
								<input type="hidden" name="post_id" value="{{$post->id}}">
							</form>
						@endif
						<h1>Коментари</h1>
						@foreach($comments as $comment)
							{{$comment->email}} - > {{$comment->comment}} <br>
						@endforeach
					</div>
					<div class="col col-2">
					</div>
				</div>
			</div>
	
		
			
@endsection