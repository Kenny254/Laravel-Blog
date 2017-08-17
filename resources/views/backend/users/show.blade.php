@extends('backend/layouts/backend-template')

@section('title', 'My Profile')

@section('content-header')
	<section class="content-header">
	      <h1>
	        View
	        <small>{{ $user->name }}</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Users</li>
	        <li>View</li>
	        <li class="active">{{ $user->name }}</li>
	      </ol>
	</section>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<div class="row">
				<div class="col-md-6">
			    	<a href="{{ route('users.index') }}" class="btn btn-info btn-block margin-bottom">Back</a>
			    </div>
			    <div class="col-md-6">
			    	{!! Html::linkRoute('users.edit', 'Edit this user', array($user->id), array('class' => 'btn btn-success btn-block margin-bottom')) !!}
			    </div>
		</div>
  

        <!-- About Me Box -->
        <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Details</h3>
	        </div>
			<!-- /.box-header -->
	        <div class="box-body">
	        	<strong><i class="fa fa-user margin-r-5"></i> Name</strong>

		        <p class="text-muted">
		           {{ $user->name }}
		        </p>


			    <strong><i class="fa fa-envelope margin-r-5"></i> Email address</strong>

		        <p class="text-muted">
		           {{ $user->email }}
		        </p>


			    <strong><i class="fa fa-calendar margin-r-5"></i> Member Since</strong>

			    <p class="text-muted">{{ date('M j, Y H:i', strtotime($user->created_at)) }}</p>


			    <strong><i class="fa fa-pencil margin-r-5"></i> Role(s)</strong>

		        <p>
		        	@if(count($user->roles) < 1)
						<span>No roles assigned</span>
		        	@else
			            @foreach($user->roles as $r)
							<span class="label label-success">{{ $r->name }}</span>
			            @endforeach
		            @endif
		        </p>

			    <strong><i class="fa fa-lock margin-r-5"></i>Permissions</strong>

			    <p class="text-justify">
			    	@if(count($user->roles) < 1)
						<span>No permissions assigned</span>
			    	@else
				    	@foreach($user->roles as $r)
							@foreach($r->permissions as $p)
								{{ $p->name }}, 
							@endforeach
				    	@endforeach
				    @endif
			    </p>
	        </div>
	        <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </div>

        
	</div><!-- /.main row -->
	
@endsection