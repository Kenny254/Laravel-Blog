@extends('backend/layouts/backend-template')

@section('title', 'My inbox')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Mailbox
	        <small>Read Mail</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Mailbox</li>
	        <li class="active">Read Mail</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
	 	<div class="col-md-3">
	 		<a href="{{ route('emails.create') }}" class="btn btn-primary btn-block margin-bottom">Compose</a>
			
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
						<li class="active"><a href=""><i class="fa fa-inbox"></i> Inbox
		                  <span class="label label-primary pull-right">1</span></a></li>
		                <li><a href="{{ route('emails.outbox') }}"><i class="fa fa-envelope-o"></i> Sent
		                  <span class="label label-success pull-right">0</span></a></li>

					</ul>
				</div><!-- /.end box-body-->

			</div><!-- /.end box -->
	 	</div><!-- /.end col-md-3 -->

	 	<div class="col-md-9">
	 		<div class="box box-primary">
	 			<div class="box-header with-border">
	 				<h3 class="box-title">Read Mail</h3>
	 			</div><!-- /.end box-header -->

	 			<div class="box-body no-padding">
	 				<div class="mailbox-read-info">
		                <h3>{{ $email->subject }}</h3>
		                <h5>From: {{ $email->from }}
		                <span class="mailbox-read-time pull-right">{{ date('M j, Y H:i', strtotime($email->created_at)) }}</span></h5>
		             </div>
	 				<div class="mailbox-controls with-border text-center">		                
		                <div class="btn-group">
		                  <a href="" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
		                    <i class="fa fa-trash-o"></i></a>
		                  <a href="{{ route('emails.index') }}" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Back">
		                    <i class="fa fa-reply"></i></a>
		                  <a href="" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Print">
		                    <i class="fa fa-print"></i></a>
		                </div>
		                <!-- /.btn-group -->
		            </div>
		            <div class="mailbox-read-message text-justify">
		            	{{ $email->body }}
		            </div>
	 			</div>

	 			<div class="box-footer">
	 				<div class="pull-right">
	 					<a href="{{ route('emails.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> Back</a>
	 				</div>
	 				<a href="" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</a>
	 				<a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
	 			</div>
	 		</div><!-- /.end box -->
	 	</div><!-- /.end col-md-9 -->
	 </div><!-- /.end row -->

@endsection

