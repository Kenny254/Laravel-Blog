@extends('backend/layouts/backend-template')

@section('title', 'My Profile')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Profile
	        <small>View my profile</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="">Profile</li>
	        <li class="active">View my profile</li>
	      </ol>
	</section>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-3">

         <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
			    <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/user-bg.png') }}" alt="User profile picture">

			        <h3 class="profile-username text-center">Anthony Mutinda</h3>
			        <p class="text-muted text-center">Software Engineer</p>

	                <ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
			                <b>Posts</b> <a class="pull-right">1,322</a>
		                </li>
		                <li class="list-group-item">
			                <b>Commented Posts</b> <a class="pull-right">69</a>
		                </li>
		                <li class="list-group-item">
			                <b>Notifications</b> <a class="pull-right">20</a>
		                </li>
	                </ul>

			        <a href="#" class="btn btn-primary btn-block"><b>Send Message</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">About Me</h3>
	        </div>
			<!-- /.box-header -->
	        <div class="box-body">
			    <strong><i class="fa fa-envelope margin-r-5"></i> Email address</strong>

		        <p class="text-muted">
		           toneymutinda@gmail.com
		        </p>

			    <hr>

			    <strong><i class="fa fa-calendar margin-r-5"></i> Member Since</strong>

			    <p class="text-muted">23rd June, 2017</p>

			    <hr>

			    <strong><i class="fa fa-pencil margin-r-5"></i> Categories</strong>

		        <p>
		            <span class="label label-danger">Fashion</span>
		            <span class="label label-success">Design</span>
		            <span class="label label-info">Architecture</span>
		            <span class="label label-warning">Technology</span>
		        </p>

			    <hr>

			    <strong><i class="fa fa-heart margin-r-5"></i> Popular Post</strong>

			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
	        </div>
	        <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
		            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
		            <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
	            </ul>

	            <div class="tab-content">	              
		            <div class="tab-pane" id="timeline">
	                    <!-- The timeline -->
		                <ul class="timeline timeline-inverse">
			                <!-- timeline time label -->
			                <li class="time-label">
			                    <span class="bg-red">
			                        10 Feb. 2014
			                    </span>
			                </li>
		                    <!-- /.timeline-label -->
		                    <!-- timeline item -->
		                    <li>
			                    <i class="fa fa-envelope bg-blue"></i>

			                    <div class="timeline-item">
				                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

				                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

				                    <div class="timeline-body">
				                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
				                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
				                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
				                        quora plaxo ideeli hulu weebly balihoo...
				                    </div>
				                    <div class="timeline-footer">
				                        <a class="btn btn-primary btn-xs">Read more</a>
				                        <a class="btn btn-danger btn-xs">Delete</a>
				                    </div>
			                    </div>
		                    </li>
		                    <!-- END timeline item -->
		                    <!-- timeline item -->
		                    <li>
			                    <i class="fa fa-user bg-aqua"></i>

			                    <div class="timeline-item">
				                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

				                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
				                    </h3>
			                    </div>
		                    </li>
		                    <!-- END timeline item -->
		                    <!-- timeline item -->
		                    <li>
			                    <i class="fa fa-comments bg-yellow"></i>

			                    <div class="timeline-item">
				                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

				                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

				                    <div class="timeline-body">
				                        Take me to your leader!
				                        Switzerland is small and neutral!
				                        We are more like Germany, ambitious and misunderstood!
				                    </div>
				                    <div class="timeline-footer">
				                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
				                    </div>
			                    </div>
		                    </li>
		                    <!-- END timeline item -->
		                    <!-- timeline time label -->
			                <li class="time-label">
		                        <span class="bg-green">
			                        3 Jan. 2014
		                        </span>
			                </li>
			                <!-- /.timeline-label -->
			                <!-- timeline item -->
			                <li>
			                    <i class="fa fa-camera bg-purple"></i>

			                    <div class="timeline-item">
				                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

				                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

				                    <div class="timeline-body">
				                        <img src="http://placehold.it/150x100" alt="..." class="margin">
				                        <img src="http://placehold.it/150x100" alt="..." class="margin">
				                        <img src="http://placehold.it/150x100" alt="..." class="margin">
				                        <img src="http://placehold.it/150x100" alt="..." class="margin">
				                    </div>
			                    </div>
			                </li>
			                <!-- END timeline item -->
			                <li>
			                    <i class="fa fa-clock-o bg-gray"></i>
			                </li>
		                </ul>
	                </div>
	                <!-- /.tab-pane -->

				    <!-- Update User Details Pane -->		
	                <div class="tab-pane" id="settings">
			            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
			            	{{ csrf_field() }}
				            <div class="form-group">
				                <label for="inputName" class="col-sm-2 control-label">Name</label>

				                <div class="col-sm-10">
					                <input type="email" class="form-control" id="inputName" placeholder="Name">
				                </div>
				            </div>
			                <div class="form-group">
				                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

				                <div class="col-sm-10">
					                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
				                </div>
			                </div>
			                <div class="form-group">
				                <label for="inputName" class="col-sm-2 control-label">Password</label>

				                <div class="col-sm-10">
					                <input type="password" class="form-control" id="inputName" placeholder="Password">
				                </div>
			                </div>
			                <div class="form-group">
				                <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>

				                <div class="col-sm-10">
					                <input type="password" class="form-control" id="inputName" placeholder="Confirm Password">
				                </div>
			                </div>
			                <div class="form-group">
				                <label for="avatar" class="col-sm-2 control-label">Upload Avatar</label>

				                <div class="col-sm-10">
					                <input type="file" class="form-control" name="image" id="image" placeholder="Choose avatar">
				                </div>
			                </div>
			                <div class="form-group">
				                <div class="col-sm-offset-2 col-sm-10">
					                <button type="submit" class="btn btn-success">Submit</button>
				                </div>
			                </div>
			            </form>
	                </div>
	                <!-- /.tab-pane -->
	            </div>
                <!-- /.tab-content -->
             </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
	</div><!-- /.main row -->
	
@endsection