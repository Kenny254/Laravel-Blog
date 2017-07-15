@extends('backend/layouts/backend-template')

@section('title', 'My posts')

@section('content-header')
	<section class="content-header">
	      <h1>
	        My posts
	        <small>View this post</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li>My posts</li>
	        <li class="active">View {{ $post->id }}</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
		   <div class="row">
		   		<div class="col-md-6">
			    	<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block margin-bottom">New Post</a>
			    </div>
			    <div class="col-md-6">
			    	<a href="{{ route('posts.index') }}" class="btn btn-info btn-block margin-bottom">Back to posts</a>
			    </div>
		   </div>
		   			
			<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"> 
                <li><a href="#"><i class="fa fa-comments"></i> Comments <span class="label label-warning pull-right">65</span></a></li>
                <li class="disabled"><a href="#"><i class="fa fa-user"></i> By Anthony Mutinda</a></li>
                <li class="disabled"><a href="#"><i class="fa fa-pencil"></i> Created on {{ date('M j, Y H:i', strtotime($post->created_at)) }}
                <li class="disabled"><a href="#"><i class="fa fa-sticky-note"></i> Category : Miscellaneous</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
		</div>

		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Read Post</h3>
				</div>
				<div class="box-body no-padding">
					<div class="mailbox-read-info">
						<h3>{{ $post->title }}</h3>
						<h5>By Anthony Mutinda
							<span class="mailbox-read-time pull-right">{{ date('M j, Y H:i', strtotime($post->created_at)) }}</span>
						</h5>
					</div>
					<!-- /. mailbox-read-info -->
					<div class="mailbox-controls with-border text-center">
									
					</div>
					<!-- /. mailbox-controls -->
					<div class="mailbox-read-message">
						<p class="text-justify">{{ $post->body }}</p>
					</div>
				</div>
				<div class="box-footer">
	              {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-sm')) !!}
	              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}
					  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
				  {!! Form::close() !!}	
	            </div>
	            <!-- /.box-footer -->
			</div>
		</div>
	</div>
@endsection
