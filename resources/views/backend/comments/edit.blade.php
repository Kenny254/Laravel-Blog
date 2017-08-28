@extends('backend/layouts/backend-template')

@section('title', 'Edit this comment')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Comments
	        <small>Edit this comment</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li>My posts</li>
	        <li class="active">Edit comment</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<a href="" class="btn btn-primary btn-block margin-bottom">Back</a>
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
                <li><a><i class="fa fa-user"></i> Posted by : <span class="pull-right">{{ $comment->name }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> Created on : <span class="pull-right">{{ date('M j, Y H:i', strtotime($comment->created_at)) }}</span></a></li>
                <li><a><i class="fa fa-pencil"></i> Last updated : <span class="pull-right">{{ date('M j, Y H:i', strtotime($comment->updated_at)) }}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
		</div>

		<div class="col-md-9">
			{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT','class' => 'form-horizontal']) !!}
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Edit comment</h3>
					</div>
					<div class="box-body no-padding">
						<div class="mailbox-read-message">
							<div class="form-group">
		 		   				{{ Form::label('name', 'Name:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Your name', 'id' => 'name', 'maxlength' => '255', 'readonly' => '')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Your email', 'id' => 'email', 'maxlength' => '255', 'readonly' => '')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('comment', 'Comment:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::textarea('comment', null, array('class' => 'form-control', 'placeholder' => 'Say something nice..', 'id' => 'comment')) }}
		 		   				</div>
		 		   			</div>
						</div>
					</div>
					<div class="box-footer">
					  {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-sm']) }}	
		            </div>
		            <!-- /.box-footer -->
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
