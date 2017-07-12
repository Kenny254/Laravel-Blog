@extends('backend/layouts/backend-template')

@section('title', 'My posts')

@section('content-header')
	<section class="content-header">
	      <h1>
	        My posts
	        <small>View all my posts</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Posts</li>
	        <li class="active">My posts</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All my posts</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm"> New Post</a>
                </div>
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
                @if(count($posts) > 0)
	                <tbody>
	                	@foreach($posts as $post)
							<tr>
								<td>{{ $post->id }}</td>
								<td>{{ $post->title }}</td>
								<td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
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
              </table>
              <div class="">
              	{!! $posts->links(); !!}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>

@endsection

@push('scripts')
<!--
	<script>
	$(function() {
	    $('#posts-table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: ,
	        columns: [
	            { data: 'id', name: 'id' },
	            { data: 'title', name: 'title' },
	            { data: 'created_at', name: 'created_at' },
	            { data: 'updated_at', name: 'updated_at' },
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ]
	    });
	});
	</script>
-->
@endpush