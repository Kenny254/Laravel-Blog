@extends('backend/layouts/backend-template')

@section('title', 'Edit this post')

@push('styles')
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>
	  	tinymce.init({ 
	  		selector:'textarea',
	  		plugins : 'advlist autolink link image lists charmap',
	  		menubar : false
	  	});
  	</script>
@endpush

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
                <li><a><i class="fa fa-user"></i> Posted by : <span class="pull-right">{{ Auth::user()->name }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> Created on : <span class="pull-right">{{ date('M j, Y H:i', strtotime($post->created_at)) }}</span></a></li>
                <li><a><i class="fa fa-pencil"></i> Last updated : <span class="pull-right">{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
		</div>

		<div class="col-md-9">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','class' => 'form-horizontal', 'files' => true]) !!}
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Post</h3>
					</div>
					<div class="box-body no-padding">
						<div class="mailbox-read-message">
							<div class="form-group">
		 		   				{{ Form::label('title', 'Title:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Your title', 'id' => 'title', 'maxlength' => '255')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('slug', 'Slug:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'eg see-nice-post-here', 'minlength' => '5', 'maxlength' => '255')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('category_id', 'Category:',array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::select('category_id', $categories, null, array('class' => 'form-control select2')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('tags', 'Tag(s):',array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::select('tags[]', $tags, null, array('class' => 'form-control select2', 'multiple' => 'multiple')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				<label for="image" class="col-sm-2 control-label">Image</label>
				                <div class="col-sm-10">
				                	<input type="file" name="image" class="form-control" required>
				                </div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('body', 'Body:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Say something nice..', 'id' => 'body')) }}
		 		   				</div>
		 		   			</div>
						</div>
					</div>
					<div class="box-footer">
					  {{ Form::button('Clear', ['onclick' => 'ClearFields();', 'class' => 'btn btn-danger btn-sm']) }}
					  {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-sm']) }}	
		            </div>
		            <!-- /.box-footer -->
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@push('scripts')
	<script>
		function ClearFields() {
		     document.getElementById("title").value = "";
		     document.getElementById("body").value = "";
		}
	</script>
	<script>
		$(function () {
			$(".select2").select2();
			$(".select2").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger("change");
		})
	</script>

@endpush