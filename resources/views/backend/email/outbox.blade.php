@extends('backend/layouts/backend-template')

@section('title', 'Sent Emails')

@section('content-header')
	<section class="content-header">
	      <h1>
	        Maiilbox
	        <small>Outbox</small>
	      </h1>
	      <ol class="breadcrumb" style="font-weight: normal;">
	        <li><i class="fa fa-dashboard"></i> Home</li>
	        <li>Mailbox</li>
	        <li class="active">Outbox</li>
	      </ol>
	</section>
@endsection

@section('content')
	 
	 <div class="row">
	 	<div class="col-md-3">
	 		<a href="" class="btn btn-primary btn-block margin-bottom">Compose</a>
			
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
		                <li><a href="#"><i class="fa fa-envelope-o"></i> Outbox
		                  <span class="label label-success pull-right">{{ count($sent) }}</span></a></li>

					</ul>
				</div><!-- /.end box-body-->

			</div><!-- /.end box -->
	 	</div><!-- /.end col-md-3 -->

	 	<div class="col-md-9">
	 		<div class="box box-primary">
	 			<div class="box-header with-border">
	 				<h3 class="box-title">Outbox</h3>
	 			</div><!-- /.end box-header -->

	 			<div class="box-body no-padding">
	 				<div class="mailbox-controls">
		                
		                <div class="btn-group">
		                  <a href="{{ route('emails.create') }}" class="btn btn-primary btn-sm">New Mail</a>
		                </div>
		                <!-- /.btn-group -->
		                
		                <div class="pull-right">
		                  1-50/200
		                  <div class="btn-group">
		                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
		                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
		                  </div>
		                  <!-- /.btn-group -->
		                </div>
		                <!-- /.pull-right -->
		              </div>
		              <div class="table-responsive mailbox-messages">
		              	<table class="table table-hover table-striped">
		              		<tbody>
		              			@if(count($sent) > 0)
			              			@foreach($sent as $out)
				              			<tr>
						                    <td class="mailbox-name">{{ $out->recipient }}</td>
						                    <td class="mailbox-subject"><b>{{ $out->subject }}</b> - {{ substr($out->body, 0, 40) }}{{ strlen($out->body) > 40 ? "..." : "" }}</td>
						                    <td class="mailbox-date">{{ $out->created_at }}</td>
						                    <td>
						                    	<a href="{{ route('emails.show', $out->id) }}" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
						                          {!! Form::open(['route' => ['emails.destroy', $out->id], 'method' => 'DELETE', 'style' => 'display: inline-block']) !!}								   
												      {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger', 'title' => 'Delete'))}}
											   	   {!! Form::close() !!}
						                    </td>
				              			</tr>
				              		@endforeach
				              	@else
				              		<tr>
				              			<td class="alert alert-warning text-center">You outbox is empty. Send an email to your buddy and see it here.</td>
				              		</tr>
				              	@endif
		              		</tbody>
		              	</table>
		              </div>
	 			</div>
	 		</div><!-- /.end box -->
	 	</div><!-- /.end col-md-9 -->
	 </div><!-- /.end row -->

@endsection

