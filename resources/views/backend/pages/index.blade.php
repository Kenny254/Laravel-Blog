@extends('backend/layouts/backend-template')

@section('title', 'Your Dashboard')

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
				<span class="info-box-icon bg-aqua"><i class="fa fa-sticky-note"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">My Posts</span>
					<span class="info-box-number">23</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-bell-o"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Notifications</span>
					<span class="info-box-number">5</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->

		<!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-thumbs-up"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Liked Posts</span>
					<span class="info-box-number">17</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-comments-o"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">My Comments</span>
					<span class="info-box-number">160</span>
				</div>
				<!-- .//info-box-content -->
			</div><!-- .//info-box -->
		</div><!-- .//col -->
	</div><!-- .//row -->

@endsection