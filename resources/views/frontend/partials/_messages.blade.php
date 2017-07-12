@if (Session::has('new-post'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('new-post') }}
	</div>
@elseif (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Errors:</strong>
		<ul>
			@foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif