@extends('backend/layouts/backend-template')

@section('title', 'All permissions')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Permissions
	        <small>View all permissions</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Access Control</li>
          <li>Permissions</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Permissions</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">Create New Permission</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-condensed">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Display Name</th>
                  <th>Description</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </thead>

                @if(count($permissions) > 0)
                  <tbody>
                    @foreach($permissions as $permission)
                      <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>{{ date('M j, Y H:i', strtotime($permission->created_at)) }}</td>
                        <td>{{ date('M j, Y H:i', strtotime($permission->updated_at)) }}</td>
                        <td>
                          <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
                          <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                @else

                  <tbody>
                        <tr>
                          <td class="alert alert-warning text-center" colspan="6">No permissions available!</td>
                        </tr>
                  </tbody>
                @endif               
              </table>
              <div>
                <span style="line-height: 60px;">Showing {!! $permissions->firstItem() !!} to {!! $permissions->lastItem() !!} of {{ $permissions->total() }} permissions</span>
                <span class="pull-right">{!! $permissions->links(); !!}</span>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>

@endsection





