@extends('backend/layouts/backend-template')

@section('title', 'Categories')

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
	        Categories
	        <small>View all categories</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Categories</li>
	        <li class="active">View All</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All categories</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm"> New category</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-condensed">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>No. of posts assigned</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </thead>
                @if(count($categories) > 0)
	                <tbody>
	                	@foreach($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>0</td>
								<td>{{ date('M j, Y H:i', strtotime($category->created_at)) }}</td>
								<td>{{ date('M j, Y H:i', strtotime($category->updated_at)) }}</td>
								<td>
									<a href="{{ route('categories.show', $category->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
									<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;								
									{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}								   
									   {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
								    {!! Form::close() !!}	
								</td>
							</tr>
	                	@endforeach
	                </tbody>
                @else
                	<tbody>
						<tr>
							<td class="alert alert-warning text-center" colspan="6">No categories available!</td>
						</tr>
                	</tbody>
                @endif               
              </table>
              @if(count($categories) > 0)
	              <div>
	                <span style="line-height: 60px;">Showing {!! $categories->firstItem() !!} to {!! $categories->lastItem() !!} of {{ $categories->total() }} categories</span>
	              	<span class="pull-right">{!! $categories->links(); !!}</span>
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




