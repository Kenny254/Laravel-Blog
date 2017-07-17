@extends('frontend.layouts.master-template')

@section('title', 'Blog')

@section('content')
   
    <div class="widget">
		<h3 class="text-center" style="font-weight: bold; text-transform: uppercase;">From the blog</h3>
	</div> <!--./end widget -->	

    @foreach($posts as $post)

	<article>
      	<div class="thumbnail">
      		  <!-- Image for each post -->
	      	  <img src="{{ asset('images/phone.jpg') }}" alt="...">
      		  <!-- Caption for post -->
		      <div class="caption">
			        <h2 class="entry-title">
			            <a href="" rel="bookmark">{{ $post->title }}</a>
			        </h2> <!-- //.entry-title -->
			        <p class="author" style="color: #9EABB3;">
			        	By Anthony Mutinda | {{ date('M j, Y H:i', strtotime($post->created_at)) }} | Nature
			        </p>
			        <p class="text-justify">{{ substr($post->body, 0, 200) }}{{ strlen($post->body) > 200 ? "..." : "" }}</p> <!-- post body --><br>
			        <p><a href="{{ route('blog.single', $post->slug) }}" class="btn btn-info" role="button">Read more</a></p>
		      </div>
      	</div>
    </article>

    @endforeach
	

    	<div class="text-center">
	    	{!! $posts->links() !!}
	    </div>
			
@endsection