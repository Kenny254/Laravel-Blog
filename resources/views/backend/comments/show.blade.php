@extends('backend/layouts/backend-template')

@section('title', 'View this comment')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Comments
	        <small>View Comment</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li>My posts</li>
	        <li>Comments</li>
	        <li class="active">View Comment</li>
	      </ol>
	</section>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-3">
		   			
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
                <li><a><i class="fa fa-sticky-note"></i> Post : <span class="">{{ $comment->post->title }}</span></a></li>
                <li><a><i class="fa fa-user"></i> By : <span class="">{{ $comment->name }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> Created on : <span class="">{{ date('M j, Y H:i', strtotime($comment->created_at)) }}</span></a></li>
                <li><a><i class="fa fa-sticky-note"></i> Last Updated on : <span class="">{{ date('M j, Y H:i', strtotime($comment->updated_at)) }}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
		</div>

		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Read Comment</h3>
				</div>
				<div class="box-body no-padding">
					<div class="mailbox-read-info">
						<h5>By {{ $comment->name }}
							<span class="mailbox-read-time pull-right">{{ date('M j, Y H:i', strtotime($comment->created_at)) }}</span>
						</h5>
					</div>
					<!-- /. mailbox-read-info -->
					<div class="mailbox-controls with-border text-center">
									
					</div>
					<!-- /. mailbox-controls -->
					<div class="mailbox-read-message">
						<p class="text-justify">{{ $comment->comment }}</p>
					</div>
				</div>
				<div class="box-footer">
	              {!! Html::linkRoute('comments.edit', 'Edit', array($comment->id), array('class' => 'btn btn-primary btn-sm')) !!}
	              {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}
					  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
				  {!! Form::close() !!}	
	            </div>
	            <!-- /.box-footer -->
			</div>
		</div>
	</div>

@endsection