@extends('backend/layouts/backend-template')

@section('title', 'New Post')

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
		<div class="col-md-10 col-md-offset-1">
			<div class="box box-info">
				<div class="box-header with-header">
					<h3 class="box-title">Create a new post</h3>
				</div>
				<!-- /.box-header -->
				<!-- Create post form -->
				{!! Form::open(['route' => 'posts.store', 'class' => 'form-horizontal']) !!}
	 		   		<div class="box-body">
	 		   			<div class="form-group">
	 		   				{{ Form::label('title', 'Title:', array('class' => 'col-sm-2 control-label', 'id' => 'title')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Your title', 'maxlength' => '255')) }}
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				{{ Form::label('slug', 'Slug:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'eg see-nice-post-here', 'minlength' => '5', 'maxlength' => '255')) }}
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				<label for="category_id" class="col-sm-2 control-label">Category</label>
	 		   				<div class="col-sm-10">
	 		   					<select name="category_id" class="form-control select2" style="width: 100%;">
					                  @foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
					                  @endforeach
		 		   				</select>
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				<label for="tags" class="col-sm-2 control-label">Tag(s)</label>
			                <div class="col-sm-10">
			                	<select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Tag">
				                      @foreach($tags as $tag)
										<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					                  @endforeach
				                </select>
			                </div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				{{ Form::label('body', 'Body:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Say something nice..', 'minlength' => '50')) }}
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

@push('scripts')

	<script>
		$(function () {
			$(".select2").select2();
		})
	</script>

@endpush
