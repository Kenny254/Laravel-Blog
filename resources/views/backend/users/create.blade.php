@extends('backend/layouts/backend-template')

@section('title', 'New User')

@section('content-header')
	<section class="content-header">
	      <h1>
	        New User
	        <small>Create a new User</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Users</li>
	        <li class="active">New User</li>
	      </ol>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="box box-info">
				<div class="box-header with-header">
					<h3 class="box-title">Create a new User</h3>
				</div>
				<!-- /.box-header -->
				<!-- Create User form -->
				{!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}
	 		   		<div class="box-body">
	 		   			<div class="form-group">
	 		   				{{ Form::label('name', 'Name:', array('class' => 'col-sm-2 control-label', 'id' => 'name')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'John Doe', 'maxlength' => '255')) }}
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				{{ Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'johndoe@example.com', 'minlength' => '5', 'maxlength' => '255')) }}
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				{{ Form::label('password', 'Password:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
	 		   				</div>
	 		   			</div>
	 		   			<div class="form-group">
	 		   				{{ Form::label('password', 'Password:', array('class' => 'col-sm-2 control-label')) }}
	 		   				<div class="col-sm-10">
	 		   					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
	 		   				</div>
	 		   			</div>
	 		   		</div>
	 		   		<!-- /.box-body -->
	 		   		<div class="box-footer">
	 		   			{{ Form::submit('Create', array('class' => 'btn btn-info pull-right')) }}
	 		   		</div>
				{!! Form::close() !!}
				<!-- /.Create User form -->
			</div> <!-- /.Box-info -->
		</div>
	</div>
@endsection
