@extends('frontend/layouts/auth-master')

@section('title', 'Log In')

@push('stylesheets')

	<style>
		div.icon-links a{
			padding: 3px;
		}
	</style>

@endpush


@section('content')

	<div class="login-box">
	    <div class="login-logo">
	        <a href="{{ url('/') }}"><i class="fa fa-desktop fa-2x" style="color: #4A90E2;" title="Back Home"></i></a>
	    </div>
		<!-- /.login-logo -->
	    <div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>

		    <form method="POST" action="{{ route('login') }}">
		    	{{ csrf_field() }}

		    	<!-- EMAIL ADDRESS -->
		        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
			        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
			        <i class="fa fa-envelope form-control-feedback"></i>
			        <!-- If email has error -->
			        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
		        </div>

		        <!-- PASSWORD -->
		        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
			        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required>
			        <i class="fa fa-lock form-control-feedback"></i>
			        <!-- If email has error -->
			        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
		        </div>
					
				<!-- Checkbox and sign in button -->			      
		        <div class="row">
			        <div class="col-xs-8">
			          <div class="checkbox icheck">
			            <label>
			              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
			            </label>
			          </div>
			        </div>
			        <!-- /.col -->

			        <div class="col-xs-4">
			          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			        </div>
			        <!-- /.col -->
		        </div>
		    </form>

		    <div class="social-auth-links text-center">
		      <p>- OR -</p>
		      <div class="icon-links">
		      	  <a href="#" title="Facebook"><img src="{{ asset('images/social/facebook.png') }}" alt="" style="width: 40px; height: 40px;"></a>
			      <a href="#" title="Twitter"><img src="{{ asset('images/social/twitter.png') }}" alt="" style="width: 40px; height: 40px;"></a>
			      <a href="#" title="Github"><img src="{{ asset('images/social/github.png') }}" alt="" style="width: 40px; height: 40px;"></a>
			      <a href="#" title="Google+"><img src="{{ asset('images/social/google-plus.png') }}" alt="" style="width: 40px; height: 40px;"></a>
		      </div>
		    </div>

		    <a href="{{ route('password.request') }}">Forgot your password?</a><br>
		    <a href="{{ url('/register') }}" class="text-center">Register here</a>

	    </div>
	    <!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->
  

@endsection

@push('scripts')
	<script>
	  $(function () {
	    $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' // optional
	    });
	  });
	</script>
@endpush