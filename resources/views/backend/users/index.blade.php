@extends('backend/layouts/backend-template')

@section('title', 'All users')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Users
	        <small>View all users</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li class="active">Users</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subscribed Users</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
	                 <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create New User</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered table-condensed">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Joined on</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </thead>
                @if(count($users) > 0)
	                <tbody>
	                	@foreach($users as $user)
        							<tr>
        								<td>{{ $user->id }}</td>
        								<td>{{ $user->name }}</td>
        								<td>{{ $user->email }}</td>
                        <td>
                          @if(count($user->roles) < 1)
                              <span>No roles assigned</span>
                          @else
                              @foreach ($user->roles as $r)
                                 @if($r->name == 'superadministrator')
                                    <span class="label label-success">{{ $r->name }}</span>
                                 @elseif($r->name == 'editor')
                                    <span class="label label-warning">{{ $r->name }}</span>
                                 @elseif($r->name == 'supporter')
                                    <span class="label label-info">{{ $r->name }}</span>
                                 @elseif($r->name == 'subscriber')
                                    <span class="label label-danger">{{ $r->name }}</span>
                                 @else
                                    <span class="label label-primary">{{ $r->name }}</span>
                                 @endif
                              @endforeach
                          @endif
                        </td>
        								<td>{{ date('M j, Y H:i', strtotime($user->created_at)) }}</td>
        								<td>{{ date('M j, Y H:i', strtotime($user->updated_at)) }}</td>
        								<td>
        									<a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
        									<a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;								
        									{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}								   
        									   {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
        								  {!! Form::close() !!}	
        								</td>
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
              <div>
                <span style="line-height: 60px;">Showing {!! $users->firstItem() !!} to {!! $users->lastItem() !!} of {{ $users->total() }} users</span>
              	<span class="pull-right">{!! $users->links(); !!}</span>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        
    </table>

@endsection





