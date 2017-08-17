@extends('frontend/layouts/auth-master')

@section('title', 'Enter reset email')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><i class="fa fa-desktop fa-2x" style="color: #4A90E2;" title="Back Home"></i></a>
        </div>
        <!-- /.login-logo -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Enter your email address</p>

            <form role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <!-- EMAIL ADDRESS -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
                  <i class="fa fa-envelope form-control-feedback"></i>
                  <!-- If email has error -->
                  @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="row">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
                  </div>
                  <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
  

@endsection
