
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
					<li><a href="">{{ $post->title }}</a></li>
					<hr style="display: inline; color: red; background: red;">
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
			<ul class="nav nav-stacked">
				<li><a href="">Lifestyle <span class="badge yellow pull-right">4</span></a></li>
				<li><a href="">Fashion <span class="badge light-blue pull-right">18</span></a></li>
				<li><a href="">Nature <span class="badge green pull-right">9</span></a></li>
				<li><a href="">Food <span class="badge red pull-right">1</span></a></li>
				<li><a href="">Political <span class="badge pink pull-right">0</span></a></li>
				<li><a href="">Economics <span class="badge deep-blue pull-right">2</span></a></li>
				<li><a href="">Technology <span class="badge pull-right">10</span></a></li>
			</ul>
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->

	<div class="widget">
		<div class="recent-posts-widget tags">
			<h3 class="title-sidebar">Tags</h3>
			<a href="" class="btn btn-sm btn-info">adventure</a>
			<a href="" class="btn btn-sm btn-info">blog</a>
			<a href="" class="btn btn-sm btn-info">fashion</a>
			<a href="" class="btn btn-sm btn-info">latest</a>
			<a href="" class="btn btn-sm btn-info">design</a>
			<a href="" class="btn btn-sm btn-info">most popular</a>
			<a href="" class="btn btn-sm btn-info">with comments</a>
			<a href="" class="btn btn-sm btn-info">liked</a>
			<a href="" class="btn btn-sm btn-info">tech</a>
			<a href="" class="btn btn-sm btn-info">unique</a>
			<a href="" class="btn btn-sm btn-info">mine</a>
			<a href="" class="btn btn-sm btn-info">nature</a>
			<a href="" class="btn btn-sm btn-info">with love</a>
			<a href="" class="btn btn-sm btn-info">food</a>
			<a href="" class="btn btn-sm btn-info">education</a>
		</div> <!-- ./end recent-posts-widget -->
	</div> <!--./end widget -->
			
