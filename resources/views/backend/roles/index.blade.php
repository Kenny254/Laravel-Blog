@extends('backend/layouts/backend-template')

@section('title', 'All Roles')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Roles
	        <small>View all roles</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Access Control</li>
          <li>Roles</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Roles</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Create New Role</a>
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

                @if(count($roles) > 0)
                  <tbody>
                    @foreach($roles as $role)
                      <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>{{ date('M j, Y H:i', strtotime($role->created_at)) }}</td>
                        <td>{{ date('M j, Y H:i', strtotime($role->updated_at)) }}</td>
                        <td>
                          <a href="{{ route('roles.show', $role->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
                          <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp;
                          {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}                  
                             {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
                          {!! Form::close() !!} 
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                @else

                  <tbody>
                        <tr>
                          <td class="alert alert-warning text-center" colspan="6">No roles available!</td>
                        </tr>
                  </tbody>
                @endif               
              </table>
              <div>
                <span style="line-height: 60px;">Showing {!! $roles->firstItem() !!} to {!! $roles->lastItem() !!} of {{ $roles->total() }} roles</span>
                <span class="pull-right">{!! $roles->links(); !!}</span>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>

@endsection





