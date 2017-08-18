@extends('backend/layouts/backend-template')

@section('title', 'View Tag')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Tags
	        <small>View <strong>{{ $tag->name }}</strong> tag</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Tags</li>
	        <li class="active">View Tag</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
		   <div class="row">
		   		<div class="col-md-6">
			    	<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block margin-bottom">Edit Tag</a>
			    </div>
			    <div class="col-md-6">
			    	<a href="{{ route('tags.index') }}" class="btn btn-info btn-block margin-bottom">Back to tags</a>
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
                <li><a><i class="fa fa-bookmark"></i> Name : <span class="pull-right">{{ $tag->name }}</span></a></li>
                <li><a><i class="fa fa-sticky-note"></i> Posts with this tag : <span class="label label-warning pull-right">{{ $tag->posts()->count() }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> Created on : <span class="pull-right">{{ date('M j, Y H:i', strtotime($tag->created_at)) }}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
		</div>

		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Posts with this tag</h3>
				</div>
				<div class="box-body table-responsive">
		              <table class="table table-striped table-bordered table-condensed">
		                <thead>
		                  <th>ID</th>
		                  <th>Title</th>
		                  <th>Tags</th>
		                  <th>Created at</th>
		                  <th>Action</th>
		                </thead>

		                @if($tag->posts()->count() > 0)
		                  <tbody>
		                    @foreach($tag->posts as $post)
		                      <tr>
		                        <td>{{ $post->id }}</td>
		                        <td>{{ $post->title }}</td>
		                        <td>
		                        	@foreach($post->tags as $tag)
										 <span class="label label-success">{{ $tag->name }}</span>
		                        	@endforeach
		                        </td>
		                        <td>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</td>
		                        <td>
		                          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
		                          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp;
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
            </div>
            <!-- /.box-body -->
			</div>
		</div>
	</div>
@endsection
