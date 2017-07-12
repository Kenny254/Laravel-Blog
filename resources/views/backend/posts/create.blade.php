@extends('backend/layouts/backend-template')

@section('title', 'New Post')

@section('content-header')
	<section class="content-header">
	      <h1>
	        New Post
	        <small>Create a new post</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li class="active">New Post</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="box box-info">
				<div class="box-header with-header">
					<h3 class="box-title">Create a new post</h3>
				</div>
				<!-- /.box-header -->
				<!-- Create post form -->
				{!! Form::open(['route' => 'posts.store', 'class' => 'form-horizontal']) !!}
	 		   		<div class="box-body">
	 		   			<div class="form-group">
	 		   				{{ Form::label('title', 'Title:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Your title')) }}
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				{{ Form::label('body', 'Body:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Say something nice..')) }}
	 		   				</div>
	 		   			</div>
	 		   		</div>
	 		   		<!-- /.box-body -->
	 		   		<div class="box-footer">
	 		   			{{ Form::submit('Create', array('class' => 'btn btn-info pull-right')) }}
	 		   		</div>
				{!! Form::close() !!}
				<!-- /.Create Post form -->
			</div> <!-- /.Box-info -->
		</div>
	</div>
@endsection
