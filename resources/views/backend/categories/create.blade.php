@extends('backend/layouts/backend-template')

@section('title', 'New Category')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Categories
	        <small>Create new category</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Categories</li>
	        <li class="active">New Category</li>
	      </ol>
	</section>
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Create new category</h3>
				</div>
				<form action="{{ route('categories.store') }}" method="POST" role="form">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" placeholder="eg Ruby on Rails" maxlength="60" class="form-control">
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

