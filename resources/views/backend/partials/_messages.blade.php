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
@elseif (Session::has('update-post'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('update-post') }}
	</div>
@elseif (Session::has('delete-post'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('delete-post') }}
	</div>
@elseif (Session::has('new-user'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('new-user') }}
	</div>
@elseif (Session::has('update-user'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('update-user') }}
	</div>
@elseif (Session::has('image-upload'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('image-upload') }}
	</div>
@elseif (Session::has('update-role'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('update-role') }}
	</div>
@elseif (Session::has('new-role'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('new-role') }}
	</div>
@elseif (Session::has('delete-role'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('delete-role') }}
	</div>
@elseif (Session::has('new-category'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('new-category') }}
	</div>
@elseif (Session::has('update-category'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('update-category') }}
	</div>
@elseif (Session::has('delete-category'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('delete-category') }}
	</div>
@elseif (Session::has('new-tag'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('new-tag') }}
	</div>
@elseif (Session::has('update-tag'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('update-tag') }}
	</div>
@elseif (Session::has('delete-tag'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('delete-tag') }}
	</div>
@elseif (Session::has('send-mail'))
	<div class="alert alert-info alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('send-mail') }}
	</div>
@elseif (Session::has('delete-mail'))
	<div class="alert alert-info alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('delete-mail') }}
	</div>
@elseif (Session::has('new-comment'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('new-comment') }}
	</div>
@endif