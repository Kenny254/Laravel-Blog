@extends('backend/layouts/backend-template')

@role('user')
	@section('title', 'My posts')
@else
	@section('title', 'All posts')
@endrole

@push('styles')
	<style>
		#search {
		    width: 80px;
		    -webkit-transition: width 0.4s ease-in-out;
		    transition: width 0.4s ease-in-out;
		}

		/* When the input field gets focus, change its width to 100% */
		#search:focus {
		    width: 20%;
		}
	</style>
@endpush

@section('content-header')
	<section class="content-header">
	      <h1>
	        @role('user')
	        	My posts
	        @else
	        	All posts
	        @endrole
	        <small>View all @role('user') my @endrole posts</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li class="active">@role('user')My @else All @endrole posts</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All @role('user')my @endrole posts</h3>

              <div class="box-tools">
              	@role('user')
	                <div class="input-group input-group-sm">
		                 <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm"> New Post</a>
	                </div>
                @endrole
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-condensed">
                <thead>
                  <th>ID</th>
                  <th>Post title</th>
                  <th>Summary</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </thead>
                @role('user')
					@if(count($posts) > 0)
		                <tbody>
		                	@foreach($posts as $post)
								<tr>
									<td>{{ $post->id }}</td>
									<td>{{ $post->title }}</td>
									<td>{{ substr(strip_tags($post->body), 0, 40) }}{{ strlen(strip_tags($post->body)) > 40 ? "..." : "" }}</td>
									<td>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</td>
									<td>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</td>
									<td>
										<a href="{{ route('posts.show', $post->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
										<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;								
										{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}								   
										   {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
									    {!! Form::close() !!}	
									</td>
								</tr>
		                	@endforeach
		                </tbody>
	                @else
	                	<tbody>
							<tr>
								<td class="alert alert-warning text-center" colspan="6">No posts available!</td>
							</tr>
	                	</tbody>
	                @endif       
				@else
					@if(count($allposts) > 0)
		                <tbody>
		                	@foreach($allposts as $post)
								<tr>
									<td>{{ $post->id }}</td>
									<td>{{ $post->title }}</td>
									<td>{{ substr(strip_tags($post->body), 0, 40) }}{{ strlen(strip_tags($post->body)) > 40 ? "..." : "" }}</td>
									<td>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</td>
									<td>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</td>
									<td>
										<a href="{{ route('posts.show', $post->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
										<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;								
										{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}								   
										   {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
									    {!! Form::close() !!}	
									</td>
								</tr>
		                	@endforeach
		                </tbody>
	                @else
	                	<tbody>
							<tr>
								<td class="alert alert-warning text-center" colspan="6">No posts available!</td>
							</tr>
	                	</tbody>
	                @endif       
                @endrole
                        
              </table>
              <div>
              	@role('user')
	                <span style="line-height: 60px;">Showing {!! $posts->firstItem() !!} to {!! $posts->lastItem() !!} of {{ $posts->total() }} posts</span>
	              	<span class="pull-right">{!! $posts->links(); !!}</span>
              	@else
					<span style="line-height: 60px;">Showing {!! $allposts->firstItem() !!} to {!! $allposts->lastItem() !!} of {{ $allposts->total() }} posts</span>
	              	<span class="pull-right">{!! $allposts->links(); !!}</span>
              	@endrole
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>

@endsection




