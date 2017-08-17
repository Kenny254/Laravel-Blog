@extends('backend/layouts/backend-template')

@section('title', 'New Role')

@push('styles')
	
	<link rel="stylesheet" href="{{ asset('css/core/blue.css') }}">

@endpush

@section('content-header')
	<section class="content-header">
	      <h1>
	        Roles
	        <small>Create new role</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Access Control</li>
	        <li>Role</li>
	        <li class="active">New Role</li>
	      </ol>
	</section>
@endsection

@section('content')
	{!! Form::open(['route' => ['roles.store'], 'class' => 'form-horizontal']) !!}
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Create a new role</h3>
					</div>
					<div class="box-body no-padding">
						<div class="mailbox-read-message">
							<div class="form-group">
		 		   				{{ Form::label('name', 'Name (slug):', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'eg admin', 'minlength' => '3','maxlength' => '20')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('display_name', 'Display Name (Human readable):', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::text('display_name', null, array('class' => 'form-control', 'placeholder' => 'eg system administrator', 'minlength' => '5', 'maxlength' => '50')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('description', 'Description:', array('class' => 'col-sm-2 control-label')) }}
		 		   				<div class="col-sm-10">
		 		   					{{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'eg this user can manage all users in the database', 'id' => 'body', 'minlength' => '5', 'maxlength' => '100')) }}
		 		   				</div>
		 		   			</div>
		 		   			<div class="form-group">
		 		   				{{ Form::label('permissions', 'Permissions:', array('class' => 'col-sm-2 control-label')) }} 
		 		   				<div class="col-sm-10">
		 		   					@foreach ($permissions as $permission)
										<input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> {{ $permission->name }} <br>
			 		   				@endforeach
		 		   				</div>
		 		   			</div>
						</div>
					</div>
					<div class="box-footer">
					  <div class="col-sm-8- col-sm-offset-2">
					  	{{ Form::submit('Create', ['class' => 'btn btn-success btn-sm']) }}	
					  </div>
		            </div>
		            <!-- /.box-footer -->
				</div>
			{!! Form::close() !!}
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
