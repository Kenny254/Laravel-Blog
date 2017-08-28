@extends('frontend.layouts.master-template')

@section('title', "	$post->title ")

@section('content')
	<div class="row">
		<div class="col-md-12">@include('backend/partials/_messages')</div>
	</div>

	<article>
      	<div class="thumbnail">
      		<div class="category">
      			{{ $post->category->name }}
      		</div>
      		<hr class="section-separator">
      		<div class="title-and-author">
      			<h2 class="post-title">
	      			{{ $post->title }}
	      		</h2>
	      		<h3 class="author">
	      			Posted By Anthony Mutinda
	      		</h3>
      		</div>
      		<hr class="section-separator">
      		<div class="action-bar">
      			<span class="time">{{ date('M j, Y H:i', strtotime($post->created_at)) }}</span> &nbsp;<span class="separator">I</span>&nbsp;
      			<span class="time"><a href="#comment"><i class="fa fa-pencil"></i> Comment</a></span> &nbsp;<span class="separator">I</span>&nbsp; 
      			<span class="time"><a href="#comments"><i class="fa fa-comments"></i> {{ $post->comments->count() }} @if($post->comments()->count() == 1) comment @else comments @endif</a></span>
      		</div>
      		<img src="{{ asset('images/wolf.jpg') }}" alt="">
      		<div class="caption">
      			<p class="text-justify">{{ $post->body }}</p> <br>
      			<div class="similar-category">
      				<hr class="">
	      			<h4 class="similar-category-title">RELATED</h4>
	      			<br>
	      			<ul class="similar-category-posts">
	      				<li><a href="">Why Barcelona Should Sign Coutinho and Ousmanne Dembele to Remain a Competitve Team</a></li>
	      				<li><a href="">This is Coming Along Quite Well</a></li>
	      				<li><a href="">The Quick Brown Fox Jumped Over The Lazy Dog</a></li>
	      			</ul>
	      			<hr class="">
      			</div> <br>
      			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eaque repudiandae consequuntur, maxime et architecto in autem dolores, hic officia libero placeat nostrum quibusdam. Similique accusantium hic quod odio sit.</p>
      		</div>
      	</div>
    </article><br>

     <div class="widget">
     	<h2 class="entry-title" style="margin: 0;">
	  		TAGS
	  	</h2>
     	<p>
        	@if($post->tags()->count() > 0)
	        	Tags: 
	        	@foreach($post->tags as $tag) 
	        		 <span class="label label-primary">{{ $tag->name }}</span>
	        	@endforeach
	        @else
	        	<div class="alert alert-warning text-center" style="margin-bottom: 0;">No tags yet!</div>
	        @endif
        </p>
     </div>

	  <div class="widget" id="comment">
		  	@if(Auth::guest())
				<h5>Please log in to post a comment</h5>
		  	@else
			  	<div class="row">
			  		<div class="col-md-2">
			  			<img src="/images/avatars/{{ Auth::user()->avatar }}" alt="" class="comment-avatar">
			  		</div>
			  		<div class="col-md-10">
			  			<form action="{{ route('comments.store', $post->id) }}" method="POST" class="form-horizontal comment-form">
							{{ csrf_field() }}
								
							<div class="form-group">
								<textarea class="form-control" name="comment" placeholder="Your Comment *" rows="2" style="background: #F7F7F7 !important"></textarea>
							</div>
								
							<button type="submit" class="btn btn-info btn-sm pull-right" style="margin-right: -14px;">Comment</button>						
						</form>
			  		</div>
			  	</div>
			@endif
		  	<hr>

		  	<div class="row comment-section" id="comments">
		  		<div class="col-md-12">
		  			<h4 class="comments-number">{{ $post->comments()->count() }} @if($post->comments()->count() == 1) comment @else comments @endif</h4>
		  			@foreach($post->comments as $comment)
			  			<div class="comment">
			  				<div class="author-info">
			  					<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=retro" }}" alt="" class="author-image">
			  					<div class="author-name">
			  						<h4 class="name">{{ $comment->name }}</h4>
			  						<p class="date">{{ $comment->created_at }}</p>
			  					</div>
			  				</div>
			  				<div class="comment-body text-justify">
			  					{{ $comment->comment }}
			  				</div>
			  			</div>
			  		@endforeach
		  		</div>
		  	</div>
	  	
	  </div>

	  
			
@endsection


