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
				    <img class="profile-user-img img-responsive img-circle" src="../images/avatars/{{ Auth::user()->avatar }}" alt="User profile picture" style="border: none;">

				        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
				        <p class="text-muted text-center">Software Engineer</p>

		                <ul class="list-group list-group-unbordered">
			                <li class="list-group-item">
				                My Posts <a class="pull-right">1,322</a>
			                </li>
			                <li class="list-group-item">
				                Commented Posts <a class="pull-right">69</a>
			                </li>
			                <li class="list-group-item">
				                Notifications <a class="pull-right">20</a>
			                </li>
		                </ul>

				        <a href="#" class="btn btn-primary btn-block"><b>Send Message</b></a>
	            </div>
	            <!-- /.box-body -->
	        </div>
	        <!-- /.box -->
        </div>

        <div class="col-md-5">
        	<!-- About Me -->
        	<div class="box box-primary">
        		<div class="box-header with-border">
        			<h3 class="box-title">About Me</h3>
        		</div>
        		<div class="box-body">
        			<strong><i class="fa fa-envelope margin-r-5"></i> Email address</strong>
        			<p class="text-muted">
        				{{ Auth::user()->email }}
        			</p>
					<hr>
        			<strong><i class="fa fa-calendar margin-r-5"></i> Member Since</strong>
        			<p class="text-muted">
        				{{ Auth::user()->created_at }}
        			</p>
					<hr>
        			<strong><i class="fa fa-pencil margin-r-5"></i> Roles</strong>
        			<p>
        				<span class="label label-danger">Superadmin</span>
        			</p>
					<hr>
        			<strong><i class="fa fa-sticky-note"></i> Last post</strong>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quas nihil, atque doloremque consectetur error ea commodi, ipsam qui. Architecto commodi dolor quasi? Rem incidunt, doloremque error dolorum earum nobis.</p>
        		</div>
        	</div>
        </div>

        <div class="col-md-4">
        	<div class="box box-primary">
        		<div class="box-header with-border">
        			<h3 class="box-title">Change Avatar</h3>
        		</div>
        		<div class="box-body">
        			<form class="form-horizontal" action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
		            	{{ csrf_field() }}
		                <div class="form-group">
			                <label for="avatar" class="col-sm-2 control-label">Upload</label>

			                <div class="col-sm-10">
				                <input type="file" class="form-control" name="avatar" id="avatar" placeholder="Choose avatar">
			                </div>
		                </div>
		                <div class="form-group">
			                <div class="col-sm-offset-2 col-sm-10">
				                <button type="submit" class="btn btn-success">Submit</button>
			                </div>
		                </div>
		            </form>
        		</div>
        	</div>
        </div>
        
	</div><!-- /.main row -->
	
@endsection