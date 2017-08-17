@extends('backend/layouts/backend-template')

@section('title', 'New Category')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Categories
	        <small>Edit {{ $category->name }} category</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Categories</li>
	        <li class="active">Edit {{ $category->name }}</li>
	      </ol>
	</section>
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit this category</h3>
				</div>
				<form action="{{ route('categories.update', $category->id) }}" method="POST" role="form">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" value="{{ $category->name }}" maxlength="60" class="form-control">
						</div>
					</div><!-- /.Box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-flat">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection