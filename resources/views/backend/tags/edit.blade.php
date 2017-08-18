@extends('backend/layouts/backend-template')

@section('title', 'Edit Tag')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Tags
	        <small>Edit {{ $tag->name }} tag</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Tags</li>
	        <li class="active">Edit {{ $tag->name }}</li>
	      </ol>
	</section>
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit this tag</h3>
				</div>
				<form action="{{ route('tags.update', $tag->id) }}" method="POST" role="form">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" value="{{ $tag->name }}" maxlength="60" class="form-control" autofocus>
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