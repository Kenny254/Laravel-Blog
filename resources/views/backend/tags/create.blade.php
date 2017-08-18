@extends('backend/layouts/backend-template')

@section('title', 'New Tag')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Tags
	        <small>Create new tag</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Tags</li>
	        <li class="active">New Tag</li>
	      </ol>
	</section>
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Create new tag</h3>
				</div>
				<form action="{{ route('tags.store') }}" method="POST" role="form">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" placeholder="eg PHP" maxlength="255" class="form-control" autofocus>
						</div>
					</div><!-- /.Box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-flat">Create</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection