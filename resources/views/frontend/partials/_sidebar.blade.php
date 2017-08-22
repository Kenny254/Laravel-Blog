
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
			<h3 class="title-sidebar">Your latest posts</h3>
			<ul class="nav nav-stacked">
				<li><a href="">Tech is power</a></li>
				<li><a href="">My first love</a></li>
				<li><a href="">Campus is fun, and scary</a></li>
				<li><a href="">Imagine me</a></li>
				<li><a href="">From my head</a></li>
			</ul>
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget">
			<h3 class="title-sidebar">From the blog</h3>
			@if(count($posts) > 0)
				<ul class="nav nav-stacked">
				  @foreach($posts as $post)
					<li><a href="{{ route('blog.single', $post->slug) }}"><img src="{{ asset('images/blogging.png') }}" alt="" style="width: 18px; height: 18px;"> {{ $post->title }}</a></li>
					<hr style="display: inline;">
				  @endforeach
				</ul>
			@else
				<div class="alert alert-warning">
					<strong>Oops: </strong> No posts available!
				</div>
			@endif
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget">
			<h3 class="title-sidebar">Categories</h3>
			@if(count($categories) > 0)
				<ul class="nav nav-stacked">
				@foreach($categories as $category)
						<li><a href="">{{ $category->name }} <span class="badge default pull-right">{{ $category->posts()->count() }}</span></a></li>
				@endforeach
				</ul>
			@endif
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget tags">
			<h3 class="title-sidebar">Tags</h3>
			@foreach($tags as $tag)
				<a href="" class="btn btn-sm btn-info">{{ $tag->name }}</a>
			@endforeach
		</div> <!-- ./end tags-widget -->
	</div> <!--./end widget -->
			
