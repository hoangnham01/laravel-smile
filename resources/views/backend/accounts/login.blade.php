@extends('backend.layouts.page')

@section('content')
  <div class="page-login">
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="post" action="{{ route('backend.postLogin') }}">
            {{ csrf_field() }}
            <h1>Login Form</h1>
            <div>
              <input type="text" name="username" class="form-control" placeholder="Username" required="" value="{{ old('username') }}"/>
            </div>
            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" required="" value="{{ old('password') }}"/>
            </div>
            <div>
              <button type="submit" class="btn btn-default submit">
                Log in
              </button>
              <a class="reset_pass" href="#forgot-password">Lost your password?</a>
            </div>
          </form>
        </section>
      </div>
      <div id="register" class="animate form registration_form none">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}"/>
            </div>
            <div>
              <button class="btn btn-default submit" href="index.html">Get password</button>
              <a class="reset_pass" href="#login">Lost your password?</a>
            </div>
          </form>
        </section>
      </div>

      <section class="login-footer separator">
        <div>
          <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
          <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
        </div>
      </section>
    </div>
  </div>
@stop

@section('js')

<script>
  $(document).ready(function(){
    $('.page-login a').click(function(e){
      e.preventDefault();
      $('.registration_form,.login_form').slideToggle();
    });
    if(window.location.href.indexOf('#forgot-password') !== -1){
      $('.registration_form,.login_form').slideToggle();
    }
  });
</script>
@stop