@extends('backend/layouts/backend-template')

@section('title', 'Edit Role')

@push('styles')
	
	<link rel="stylesheet" href="{{ asset('css/core/blue.css') }}">

@endpush

@section('content-header')
	<section class="content-header">
	      <h1>
	        Roles
	        <small>Edit this role</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Access Control</li>
	        <li>Role</li>
	        <li class="active">Edit {{ $role->display_name }}</li>
	      </ol>
	</section>
@endsection

@section('content')
	<form action="{{ route('roles.update', $role->id) }}" method="POST" class="form-horizontal">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}

		<div class="box box-info">		
			<div class="box-header with-border">
				<h3 class="box-title">Edit {{ $role->display_name }}</h3>
			</div>
			<div class="box-body no-padding">
				<div class="mailbox-read-message">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="form-group">
								<label for="name">Name (can't be edited)</label>
								<input type="text" name="name" class="form-control" value="{{ $role->name }}" title="This field can't be edited" disabled>
							</div>
							<div class="form-group">
								<label for="display_name">Display Name (human-readable)</label>
								<input type="text" name="display_name" class="form-control" value="{{ $role->display_name }}" minlength="5" maxlength="50">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" name="description" class="form-control" value="{{ $role->description }}" minlength="5" maxlength="100"></input>
							</div>
							<div class="form-group">
								<label for="permissions">Permissions</label><br>
								@foreach ($permissions as $permission)
									<input type="checkbox" {{ in_array($permission->id,$role_permissions)?"checked":"" }} name="permissions[]" value="{{ $permission->id }}"> {{ $permission->display_name }} <br>
		 		   				@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="box-footer" style="margin-left: 163px;">
				<button onclick="ClearFields()" class="btn btn-danger btn-sm btn-flat">Clear</button>
				<button type="submit" class="btn btn-success btn-sm btn-flat">Save Changes</button>
			</div>	
		</div>
	</form>
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

@endpush


