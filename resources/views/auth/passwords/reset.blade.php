@extends('frontend/layouts/auth-master')

@section('title', 'Reset Your Password')

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

            <form role="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <!-- EMAIL ADDRESS -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email address" required autofocus>
                  <i class="fa fa-envelope form-control-feedback"></i>
                  <!-- If email has error -->
                  @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <!-- NEW PASSWORD -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    <i class="fa fa-lock form-control-feedback"></i>
                    <!-- If email has error -->
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- PASSWORD CONFIRMATION -->
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" required>
                    <i class="fa fa-lock form-control-feedback"></i>
                    <!-- If email has error -->
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit New Password</button>
                  </div>
                  <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
  

@endsection
