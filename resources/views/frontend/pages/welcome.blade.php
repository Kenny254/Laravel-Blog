@extends('frontend.layouts.master-template')

@section('title', 'Welcome')

@section('content')
    <div class="widget">
		<h3 class="text-center" style="font-weight: bold; text-transform: uppercase;">Read Latest posts below</h3>
	</div> <!--./end widget -->	

    <!-- Loop through all recent posts -->
	@foreach($posts as $post)
      <article>
      	<div class="thumbnail">
      	      <!-- Image for each post -->
      		  <img src="{{ asset('images/pic1.jpg') }}" alt="...">
      		  <!-- Caption for post -->
		      <div class="caption">
			        <h2 class="entry-title">
			            <a href="" rel="bookmark">{{ $post->title }}</a>
			        </h2> <!-- //.entry-title -->
			        <p class="text-muted author">
			        	<i>
			        		By 
				        	<strong>Anthony Mutinda</strong>
				        	on 
				        	<strong>23rd June, 2017</strong>
				        	in 
				        	<strong>Nature</strong>
			        	</i>
			        </p>
			        <p class="text-justify">{{ $post->body }}</p> <!-- post body --><br>
			        <p><a href="{{ url('read') }}" class="btn btn-info" role="button">Read more</a></p>
		      </div>
      	</div>
      </article>
    @endforeach<!-- ./end foreach -->
			
@endsection


