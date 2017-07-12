@extends('backend/layouts/backend-template')

@section('title', 'Edit this post')

@section('content-header')
	<section class="content-header">
	      <h1>
	        My posts
	        <small>Edit this post</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li>My posts</li>
	        <li class="active">Edit {{ $post->id }}</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<a href="{{ route('posts.index') }}" class="btn btn-primary btn-block margin-bottom">Back</a>
			<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">About this post</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="disabled"><a href="#"><i class="fa fa-user"></i> Posted by Anthony Mutinda</a></li>
                <li class="disabled"><a href="#"><i class="fa fa-pencil"></i> Created on {{ date('M j, Y H:i', strtotime($post->created_at)) }}</a></li>
                <li class="disabled"><a href="#"><i class="fa fa-sticky-note"></i> Last updated on {{ date('M j, Y H:i', strtotime($post->updated_at)) }}</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
		</div>

		<div class="col-md-9">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','class' => 'form-horizontal']) !!}
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Post</h3>
					</div>
					<div class="box-body no-padding">
						<div class="mailbox-read-message">
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
					</div>
					<div class="box-footer">
		              {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-sm')) !!}
					  {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-sm']) }}	
		            </div>
		            <!-- /.box-footer -->
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection