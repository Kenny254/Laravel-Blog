@extends('backend/layouts/backend-template')

@section('title', 'Edit this post')

@push('styles')
	
	<link rel="stylesheet" href="{{ asset('css/core/blue.css') }}">

@endpush

@section('content-header')
	<section class="content-header">
	      <h1>
	        Users
	        <small>Edit this user</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Users</li>
	        <li class="active">Edit {{ $user->name }}</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<a href="{{ route('users.index') }}" class="btn btn-primary btn-block margin-bottom">Back</a>
			<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">About this user</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a><i class="fa fa-user"></i> <strong>Name</strong> <span class="pull-right">{{ $user->name }}</span></a></li>
                <li><a><i class="fa fa-calendar"></i> <strong>Joined on</strong> <span class="pull-right">{{ date('M j, Y', strtotime($user->created_at)) }}</span></a></li>
                <li><a><i class="fa fa-pencil"></i> <strong>Last updated</strong> <span class="pull-right">{{ date('M j, Y', strtotime($user->updated_at)) }}</span></a></li>
                <li>
                	<a><i class="fa fa-th-large"></i> <strong>Role(s):</strong>
                		 @if(count($user->roles) < 1)
							<span class="pull-right">No role assigned</span>
                		 @else
	                		 @foreach($user->roles as $r)
								<span class="label label-success">{{ $r->name }}</span>
	                		 @endforeach
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
			<form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal">

				{{ method_field('PATCH') }}
				{{ csrf_field() }}

				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Edit {{ $user->name }}</h3>
					</div>
					<div class="box-body no-padding">
						<div class="mailbox-read-message">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" maxlength="255">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" minlength="5" maxlength="255">
									</div>
									<div class="form-group has-feedback">
										<label for="password">Password</label>
										<input type="password" name="password" class="form-control" data-toggle="password">
									</div>
									<div class="form-group">
										<label for="roles">Roles</label>
										<div class="user-roles">
											@foreach($roles as $role)
												<input type="checkbox" {{ in_array($role->id,$user_roles)?"checked":"" }} name="roles[]" value="{{ $role->id }}"> {{ $role->display_name }} <br>
				 		   					@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer" style="margin-left: 125px;">
						<button onclick="ClearFields()" class="btn btn-danger btn-sm btn-flat">Clear</button>
						<button type="submit" class="btn btn-success btn-sm btn-flat">Save Changes</button>
					</div>	
				</div>
				
			</form>
		</div>
	</div>
@endsection

@push('scripts')
	
	<script src="{{ asset('js/plugins/icheck.js') }}"></script>
	<script>
		$(function () {
	      $('input').iCheck({
	        checkboxClass: 'icheckbox_square-blue',
	        radioClass: 'iradio_square-blue',
	        increaseArea: '5%' // optional
	      });
	    });
	</script>
	<script>
		function ClearFields() {
		     document.getElementById("username").value = "";
		     document.getElementById("email").value = "";
		     document.getElementById("password").value = "";
		}
	</script>

@endpush