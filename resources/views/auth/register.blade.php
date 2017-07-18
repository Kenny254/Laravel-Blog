@extends('frontend/layouts/auth-master')

@section('title', 'Register')


@section('content')

   <div class="register-box">
       <div class="register-logo">
            <a href="{{ url('/') }}"><i class="fa fa-desktop fa-2x" style="color: #4A90E2;" title="Back Home"></i></a>
       </div>

       <div class="register-box-body">
          <p class="login-box-msg">Register a new membership</p>

          <!-- Register Form -->
          <form method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}

              <!-- User Name -->
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
                  <i class="fa fa-user form-control-feedback"></i>
                  <!-- if name has error -->
                  @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
              </div>

              <!-- Email Address -->
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required>
                  <i class="fa fa-envelope form-control-feedback"></i>
                  <!-- if email has error -->
                  @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
              </div>

              <!-- Password -->
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                  <i class="fa fa-lock form-control-feedback"></i>
                  <!-- if password has error -->
                  @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
              </div>

              <!-- Password Confirmation -->
              <div class="form-group has-feedback">
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confrim Password" required>
                  <i class="fa fa-lock form-control-feedback"></i>
              </div>

              <!-- Submit Button -->
              <div class="row">
                 <div class="col-xs-4">
                     <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                 </div> 
              </div>

          </form>
          <br> 
          <a href="{{ url('/login') }}" class="text-center">I already have an account</a>
       </div>
   </div>
  

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