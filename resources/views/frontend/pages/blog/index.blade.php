@extends('frontend.layouts.master-template')

@section('title', 'Blog')

@section('content')
   
    <div class="widget">
		<h3 class="text-center from-blog" style="font-weight: bold; text-transform: uppercase;">From the blog</h3>
	</div> <!--./end widget -->	

	@if(count($posts) > 0)
	    @foreach ($posts->chunk(3) as $chunk)
		    <div class="row is-flex">
		        @foreach ($chunk as $post)
		            <div class="col-xs-4">
		            	<a href="{{ route('blog.single', $post->slug) }}">
		            		<div class="thumbnail post-thumb">	            		
		            			<img src="/images/posts/{{ $post->image }}" alt="" style="height: 193.8px !important;">
		            			<h5 class="index-category"><a href="">{{ $post->category->name }}</a></h5>
		            			<h5 class="index-title text-justify">{{ $post->title }}</h5>
			          			<p class="index-comments">{{ $post->comments()->count() }} comments / {{ date('M j, Y', strtotime($post->created_at)) }}</p>
		            		</div>
		            	</a>
		            </div>
		        @endforeach
		    </div>
		@endforeach
	@else
		<div class="alert alert-warning text-center">
			No posts are available
		</div>
	@endif
			
@endsection
