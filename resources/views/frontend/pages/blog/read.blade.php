@extends('frontend.layouts.master-template')

@section('title', "	$post->title ")

@section('content')
	<div class="row">
		<div class="col-md-12">@include('backend/partials/_messages')</div>
	</div>

	<article>
      	<div class="thumbnail">
      	      <!-- Image for each post -->
      		  <img src="{{ asset('images/pic1.jpg') }}" alt="">
      		  <!-- Caption for post -->
		      <div class="caption">
			        <h2 class="entry-title">
			            <a href="" rel="bookmark">{{ $post->title }}</a>
			        </h2> <!-- //.entry-title -->
			        <p class="author" style="color: #9EABB3;">
			        	By Anthony Mutinda | {{ date('M j, Y H:i', strtotime($post->created_at)) }} | Posted in <b>{{ $post->category->name }}</b>
			        </p>
			        <p class="text-justify">{{ $post->body }}</p> <!-- post body --><br>
			        <p>
			        	@if($post->tags()->count() > 0)
				        	Tags: 
				        	@foreach($post->tags as $tag) 
				        		 <span class="label label-primary">{{ $tag->name }}</span>
				        	@endforeach
				        @else
				        	<span class="alert alert-warning">No tags yet!</span>
				        @endif
			        </p>
		      </div>
      	</div>
    </article><br>

	  <div class="widget">
		  	<h2 class="entry-title">
		  		Post your comment
		  	</h2>
		  	<div class="guest">
		  	@if(Auth::guest())
		  		<div><p>Please Log in first to comment on this post</p></div>
		  	@else
		  		<p>
		  			<div class="row">
		  				<div class="col-md-12">
							<form action="{{ route('comments.store', $post->id) }}" method="POST">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="name" placeholder="Your Name *" style="background: #F7F7F7 !important" value="{{ Auth::user()->name }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Your Email *" style="background: #F7F7F7 !important" value="{{ Auth::user()->email }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="comment" placeholder="Your Comment *" rows="10" style="background: #F7F7F7 !important"></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									<div class="col-lg-12 text-center">
										<div id="success"></div>
										<button type="submit" class="btn btn-info">Post Comment</button>
									</div>
								</div>
							</form>
						</div>
		  			</div>
		  		</p>
		  	@endif
		  	</div>
	  </div>

	  <div class="widget">
	  	<h5 class="comments-title" style="font-size: 18px;"><i class="fa fa-comments"></i> {{ $post->comments()->count() }} comments</h5><br>
	  	<div class="comments">
	  		@if($post->comments->count() > 0)
	  			@foreach($post->comments as $comment)
			  		<div class="row">
			  			<div class="col-md-2 user-pic">
			  				<img src="{{ asset('images/user-sm.png') }}" alt="">
			  			</div>
			  			<div class="col-md-10 user-comment text-justify">
			  			   <h3 style="margin-top: 0 !important;">{{ $comment->name }}</h3>
			  			   <h5 style="color: #CCC;">{{ date('M j, Y H:i', strtotime($comment->created_at)) }}</h5>
			  				{{ $comment->comment }}
			  			</div>
			  			<a href="" class="btn btn-info pull-right">Reply</a>
			  		</div>
			  		<hr>
		  		@endforeach
	  		@else
	  			<div class="row">
	  				<div class="col-md-12">
	  					<span class="alert alert-warning">No comments available</span>
	  				</div>
	  			</div>
	  		@endif
	  	</div>
	  </div>
			
@endsection


