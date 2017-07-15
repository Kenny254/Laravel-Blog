@extends('frontend.layouts.master-template')

@section('title', "	$post->title ")

@section('content')

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
			        <p><strong>Tags: </strong>Lifestyle, adventure, blog, first</p>
		      </div>
      	</div>
      </article><br>

      <div class="widget text-center">
		<a href="" class="btn btn-info">Previous Post</a> &nbsp; &nbsp; &nbsp; &nbsp; <a href="" class="btn btn-info">Next Post</a>
	  </div> <!--./end widget -->

	  <div class="widget">
		  	<h2 class="entry-title">
		  		Post your comment
		  	</h2>
		  	<div class="guest">
		  		<div><p>Please Log in first to comment on this post</p></div>
		  		<p>
		  			<div class="row">
		  				<div class="col-md-12">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Name *" style="background: #F7F7F7 !important">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Your Email *" style="background: #F7F7F7 !important">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" placeholder="Your Comment *" rows="10" style="background: #F7F7F7 !important"></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									<div class="col-lg-12 text-center">
										<div id="success"></div>
										<button type="submit" class="btn btn-info">Send Comment</button>
									</div>
								</div>
							</form>
						</div>
		  			</div>
		  		</p>
		  	</div>
	  </div>

	  <div class="widget">
	  	<h5 class="comments-title" style="font-size: 18px;"><i class="fa fa-comments"></i> 2 comments</h5><br>
	  	<div class="comments">
	  		<div class="row">
	  			<div class="col-md-2 user-pic">
	  				<img src="{{ asset('images/user-sm.png') }}" alt="">
	  			</div>
	  			<div class="col-md-10 user-comment text-justify">
	  			   <h3 style="margin-top: 0 !important;">Anthony Mutinda</h3>
	  			   <h5 style="color: #CCC;">8 July, 2017</h5>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ex inventore eveniet enim, asperiores velit, repellendus quaerat voluptate tempora laboriosam, omnis quis libero deleniti eligendi vero quam praesentium quae sunt!
	  			</div>
	  			<a href="" class="btn btn-info pull-right">Reply</a>
	  		</div>
	  		<hr>
	  		<div class="row">
	  			<div class="col-md-2 user-pic">
	  				<img src="{{ asset('images/user-sm.png') }}" alt="">
	  			</div>
	  			<div class="col-md-10 user-comment text-justify">
	  			   <h3 style="margin-top: 0 !important;">Thomas O'neil</h3>
	  			   <h5 style="color: #CCC;">8 July, 2017</h5>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ex inventore eveniet enim, asperiores velit, repellendus quaerat voluptate tempora laboriosam, omnis quis libero deleniti eligendi vero quam praesentium quae sunt!
	  			</div>
	  			<a href="" class="btn btn-info pull-right">Reply</a>
	  		</div>
	  	</div>
	  </div>
			
@endsection


