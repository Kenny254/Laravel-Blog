
	<div class="widget">
		<div class="search-widget">
			<form>
			  <div class="input-group">
			    <input type="text" class="form-control" placeholder="Search ...">
			    <div class="input-group-btn">
			      <button class="btn btn-info" type="submit">
			        <!--<i class="fa fa-search" aria-hidden="true"></i>-->
			        Search
			      </button>
			    </div>
			  </div>
			</form>
		</div> <!-- ./end search-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget">
			<h3 class="title-sidebar">Your 5 latest posts</h3>
			@if(Auth::guest())
				<div class="alert alert-warning text-center">Log in to see your latest posts</div>
			@else		
				<ul class="nav nav-stacked">
					@foreach($userlatest as $mine)
						<li><a href="{{ route('blog.single', $mine->slug) }}">{{ $mine->title }}</a></li>
					@endforeach
				</ul>
			@endif
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget">
			<h3 class="title-sidebar">Latest 5 posts from the blog</h3>
			@if(count($latest) > 0)
				<ul class="nav nav-stacked">
				  @foreach($latest as $recent)
					<li><a href="{{ route('blog.single', $recent->slug) }}"><img src="{{ asset('images/blogging.png') }}" alt="" style="width: 18px; height: 18px;"> {{ $recent->title }}</a></li>
					<hr style="display: inline;">
				  @endforeach
				</ul>
			@else
				<div class="alert alert-warning text-center">
					No posts are available
				</div>
			@endif
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget" id="categories">
		<div class="recent-posts-widget">
			<h3 class="title-sidebar">Categories</h3>
			@if(count($categories) > 0)
				<ul class="nav nav-stacked">
				@foreach($categories as $category)
						<li><a href="">{{ $category->name }} <span class="badge default pull-right">{{ $category->posts()->count() }}</span></a></li>
				@endforeach
				</ul>
			@else
				<div class="alert alert-warning text-center">No categories are available</div>
			@endif
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget tags">
			<h3 class="title-sidebar">Tags</h3>
			@if(count($tags) > 0)
				@foreach($tags as $tag)
					<a href="" class="btn btn-sm btn-info">{{ $tag->name }}</a>
				@endforeach
			@else
				<div class="alert alert-warning text-center">
					No tags are available
				</div>
			@endif
		</div> <!-- ./end tags-widget -->
	</div> <!--./end widget -->
			
