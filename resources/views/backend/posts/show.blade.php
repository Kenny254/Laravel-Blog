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
                <li><a href="#comments"><i class="fa fa-comments"></i> Comments <span class="label label-warning pull-right">{{ $post->comments()->count() }}</span></a></li>
                <li><a href="{{ route('blog.single', $post->slug) }}"><i class="fa fa-link"></i>{{ route('blog.single', $post->slug) }}</a></li>
                <li><a><i class="fa fa-user"></i> By : <span class="">{{ Auth::user()->name }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> Created on : <span class="">{{ date('M j, Y H:i', strtotime($post->created_at)) }}</span></a></li>
                <li><a><i class="fa fa-sticky-note"></i> Category : <span class="label label-success">{{ $post->category->name }}</span></a></li>
                <li>
                	<a>
                		<i class="fa fa-tags"></i> 
                		Tags : 
                		@if($post->tags()->count() > 0)
                			@foreach($post->tags as $tag)
                				<span class="label label-default">{{ $tag->name }}</span>
                			@endforeach
                		@else
                			No tags available
                		@endif
                	</a>
                </li>
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

	<div class="row" id="comments">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">All comments</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm"> New Comment</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-condensed">
                <thead>
                  <th>ID</th>
                  <th>Posted by</th>
                  <th>Summary</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </thead>
                @if($post->comments()->count() > 0)
	                <tbody>
	                	@foreach($post->comments as $comment)
        							<tr>
        								<td>{{ $comment->id }}</td>
        								<td>{{ $comment->name }}</td>
        								<td>{{ substr($comment->comment, 0, 40) }}{{ strlen($comment->comment) > 40 ? "..." : "" }}</td>
        								<td>{{ date('M j, Y H:i', strtotime($comment->created_at)) }}</td>
        								<td>{{ date('M j, Y H:i', strtotime($comment->updated_at)) }}</td>
        								<td>
        									<a href="{{ route('comments.show', $comment->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
        									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;								
        								</td>
        							</tr>
	                	@endforeach
	                </tbody>
                @else
                	<tbody>
						<tr>
							<td class="alert alert-warning text-center" colspan="6">No comments available!</td>
						</tr>
                	</tbody>
                @endif               
              </table>
              <div>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>
@endsection
