@extends('backend/layouts/backend-template')

@section('title', 'Your Dashboard')

@push('styles')
	<style>
		.thumbnail{
		    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		    transition: 0.3s;
		}
		.thumbnail:hover {
		    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}
		.latest-img{
			width: 65.75px;
			height: 65.75px;
		}
	</style>
	{!! Charts::assets() !!}
@endpush

@section('content-header')
	<section class="content-header">
	      <h1>
	        Dashboard
	        <small>Welcome to your dashboard</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Dashboard</li>
	      </ol>
	</section>
@endsection

@section('content')

	<!-- Info Boxes Summary -->
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua">
					@role('user')
						<i class="fa fa-sticky-note"></i>
					@else
						<i class="fa fa-users"></i>
					@endrole
				</span>
				<div class="info-box-content">
					<span class="info-box-text">
						@role('user')
							My Posts
						@else
							Total Users
						@endrole
					</span>
					<span class="info-box-number">
						@role('user')
							{{ count($posts) }}
						@else
							{{ count($allusers) }}
						@endrole
					</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red">
					@role('user')
						<i class="fa fa-envelope"></i>
					@else
						<i class="fa fa-sticky-note"></i>
					@endrole
				</span>
				<div class="info-box-content">
					<span class="info-box-text">
						@role('user')
							Messages
						@else
							Total Posts
						@endrole
					</span>
					<span class="info-box-number">
						@role('user')
							{{ count($messages) }}
						@else
							{{ count($allposts) }}
						@endrole
					</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->

		<!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green">
					@role('user')
						<i class="fa fa-bell-o"></i>
					@else
						<i class="fa fa-inbox"></i>
					@endrole
				</span>
				<div class="info-box-content">
					<span class="info-box-text">
						@role('user')
							Notifications
						@else
							Inbox
						@endrole
					</span>
					<span class="info-box-number">
						@role('user')
							0
						@else
							{{ count($messages) }}
						@endrole
					</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow">
					@role('user')
						<i class="fa fa-comments-o"></i>
					@else
						<i class="fa fa-envelope"></i>
					@endrole
				</span>
				<div class="info-box-content">
					<span class="info-box-text">
						@role('user')
							My Comments
						@else
							Total Messages
						@endrole
					</span>
					<span class="info-box-number">
						@role('user')
							{{ count($comments) }}
						@else
							{{ count($allmessages) }}
						@endrole
					</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->
	</div><!-- .//row -->

	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				
				<div class="box-body">
					<center>
						@role('user')
			            	{!! $chart->render() !!}
			            @else
			            	{!! $userchart->render() !!}
			            @endrole
			        </center>
				</div>
			</div>
		</div>
	</div>

	@role('user')	
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">My Latest Posts &nbsp;
						<small>View 4 of your latest posts</small>
						</h3>
					</div>
					<div class="box-body">					
						<div class="row">
							@foreach($mylatest->chunk(4) as $chunk)
								@foreach($chunk as $post)
									<div class="col-xs-3">
										<a href="{{ route('posts.show', $post->id) }}">
											<div class="thumbnail">
												<img src="/images/posts/{{ $post->image }}" alt="" style="height: 150.8px !important;">
												<h5 class="text-center" style="text-transform: uppercase; color: #000">{{ $post->title }}</h5>
												<h6 class="text-center" style="color: #000;">{{ date('M j, Y H:i', strtotime($post->created_at)) }}</h6>
											</div>
										</a>
									</div>
								@endforeach
							@endforeach
						</div>		
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-md-7">
				<div class="box box-info">
					<div class="box-body">
						<center>
							{!! $allpostschart->render() !!}
						</center>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Latest Users</h3>
					</div>
					<div class="box-body no-padding">
						<ul class="users-list clearfix">
							@foreach($latestusers as $user)
								<li>
									<img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="" class="latest-img">
									<a class="users-list-name" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
									<span class="users-list-date">{{ date('M j, Y', strtotime($user->created_at)) }}</span>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="box-footer text-center">
						<a href="{{ route('users.index') }}">View All Users</a>
					</div>
				</div>
			</div>
		</div>
	@endrole
		



@endsection