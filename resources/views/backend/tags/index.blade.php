@extends('backend/layouts/backend-template')

@section('title', 'All Tags')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Tags
	        <small>View all tags</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Tags</li>
          <li>All Tags</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Tags</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm">Create New Tag</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-condensed">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>No. of posts tagged</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </thead>

                @if(count($tags) > 0)
                  <tbody>
                    @foreach($tags as $tag)
                      <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->posts()->count() }}</td>
                        <td>{{ date('M j, Y H:i', strtotime($tag->created_at)) }}</td>
                        <td>{{ date('M j, Y H:i', strtotime($tag->updated_at)) }}</td>
                        <td>
                          <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
                          <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp;
                          {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}                  
                             {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
                          {!! Form::close() !!} 
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                @else
                  <tbody>
                        <tr>
                          <td class="alert alert-warning text-center" colspan="6">No tags available!</td>
                        </tr>
                  </tbody>
                @endif               
              </table>
              @if(count($tags) > 0)
                <div>
                  <span style="line-height: 60px;">Showing {!! $tags->firstItem() !!} to {!! $tags->lastItem() !!} of {{ $tags->total() }} tags</span>
                  <span class="pull-right">{!! $tags->links(); !!}</span>
                </div>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>

@endsection





