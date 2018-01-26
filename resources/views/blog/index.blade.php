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
			<div class="col col-12">
				<div class="flexbox">
				@foreach($posts as $post)
					<article>
						<div class="postImg" style="background-image: url({{asset('blog-posts/'.$post->image)}})">
						</div>
						<div class="postExcerpt">
							<h1 class="post_title"><a href="{{asset('post/'.$post->id)}}">{{$post->title}}</a></h1>
							<p>{{ strip_tags(substr($post->content,0,500)) }}</p>
						</div>
						
						<div class="postFooter flexbox">
							<span class="readMore">
								<a href="{{asset('post/'.$post->id)}}">Прочети повече</a>
							</span>
							<div class="postLikes">
								<span class="fa fa-heart"></span>
							</div>
							<div class="postComments">
								<span class="fa fa-comments"></span>
							</div>
							<div class="postViews">
								<span class="fa fa-eye"></span>
							</div>
						</div>
					</article>
				@endforeach
				</div>
				<ul class="pagination justify-content-center">
    				{!! $posts->links() !!}
  				</ul>
			</div>
		</div>
	</div>
@endsection