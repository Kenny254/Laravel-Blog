@extends('backend/layouts/backend-template')

@section('title', 'View Role')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Roles
	        <small>View <strong>{{ $role->name }}</strong> role</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Access Control</li>
	        <li>Role</li>
	        <li class="active">View Role</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
		   <div class="row">
		   		<div class="col-md-6">
			    	<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-block margin-bottom">Edit Role</a>
			    </div>
			    <div class="col-md-6">
			    	<a href="{{ route('roles.index') }}" class="btn btn-info btn-block margin-bottom">Back to roles</a>
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
                <li><a><i class="fa fa-bookmark"></i> Name : <span class="pull-right">{{ $role->name }}</span></a></li>
                <li><a><i class="fa fa-sticky-note"></i> Description : <span class="pull-right text-justify">{{ $role->description }}</span></a></li>
                <li><a><i class="fa fa-user"></i> Users assigned : <span class="label label-warning pull-right">{{ count($role->users) }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> Created on : <span class="pull-right">{{ date('M j, Y H:i', strtotime($role->created_at)) }}</span></a></li>
                <li><a class="text-justify"><i class="fa fa-lock"></i> Permissions : @foreach($role->permissions as $p) {{ $p->name }}, @endforeach</a>
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
					<h3 class="box-title">Users with this role</h3>
				</div>
				<div class="box-body table-responsive">
		              <table class="table table-striped table-bordered table-condensed">
		                <thead>
		                  <th>ID</th>
		                  <th>Name</th>
		                  <th>Email</th>
		                  <th>Created at</th>
		                </thead>

		                @if(count($role->users) > 0)
		                  <tbody>
		                    @foreach($role->users as $user)
		                      <tr>
		                        <td>{{ $user->id }}</td>
		                        <td>{{ $user->name }}</td>
		                        <td>{{ $user->email }}</td>
		                        <td>{{ date('M j, Y H:i', strtotime($role->created_at)) }}</td>
		                      </tr>
		                    @endforeach
		                  </tbody>
		                @else

		                  <tbody>
		                        <tr>
		                          <td class="alert alert-warning text-center" colspan="6">No users available!</td>
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
