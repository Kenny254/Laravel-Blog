@extends('backend/layouts/backend-template')

@section('title', 'New Mail')

@push('styles')

	<style>
		.form-control-feedback{
			color: #CCC;
		}
		.input-group-addon{
			background: #ccc;
		}
	</style>
	<link rel="stylesheet" href="{{ asset('css/dashboard/bootstrap3-wysihtml5.min.css') }}">

@endpush

@section('content-header')
	<section class="content-header">
	      <h1>
	        Mailbox
	        <small>Compose new mail</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Mailbox</li>
	        <li class="active">Compose</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
	 	<div class="col-md-3">
	 		<a href="{{ route('emails.index') }}" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
			
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Folders</h3>
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
					</div><!-- /.end box-tools-->
				</div><!-- /.end box-header-->

				<div class="box-body no-padding">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="{{ route('emails.index') }}"><i class="fa fa-inbox"></i> Inbox
		                  <span class="label label-primary pull-right">{{ count($inbox) }}</span></a></li>
		                <li><a href="{{ route('emails.outbox') }}"><i class="fa fa-envelope-o"></i> Sent
		                  <span class="label label-success pull-right">{{ count($sent) }}</span></a></li></a></li>
					</ul>
				</div><!-- /.end box-body-->

			</div><!-- /.end box -->
	 	</div><!-- /.end col-md-3 -->

	 	<div class="col-md-9">
	 		<div class="box box-primary">
	 			<div class="box-header with-border">
	 				<h3 class="box-title">Compose New Message</h3>
	 			</div>
	 			<form action="{{ route('emails.store') }}" method="POST">
	 				{{ csrf_field() }}
	 				<div class="box-body">	 				
	 					<div class="form-group has-feedback">
	 						<div class="input-group">
	 						    <div class="input-group-addon">To</div>
	 							<input type="email" class="form-control" name="recipient">
	 						</div>
	 						<i class="fa fa-envelope form-control-feedback"></i>
	 					</div>
	 					<div class="form-group has-feedback">
	 						<div class="input-group">
	 							<div class="input-group-addon">Subject</div>
	 							<input type="text" class="form-control" name="subject" maxlength="255">
	 						</div>
	 						<i class="fa fa-pencil form-control-feedback"></i>
	 					</div>
	 					<div class="form-group">
	 						<textarea name="body" id="compos" class="form-control" style="height: 300px;">
	 							
	 						</textarea>
	 					</div>
	 				</div>
	 				<div class="box-footer">
	 					<div class="pull-right">
	 						<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
	 					</div>
	 					<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Discard</button>
	 				</div>
	 			</form>
	 		</div>
	 	</div><!-- /.end col-md-9 -->
	 </div><!-- /.end row -->

@endsection

@push('scripts')

	<script src="{{ asset('js/plugins/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>
		$(function () {
	    //Add text editor
	    $("#compose-textarea").wysihtml5();
	  });
	</script>

@endpush

