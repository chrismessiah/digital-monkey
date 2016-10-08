<div class="sign-up">	
  <p class="title">Sign up</p>
  <div class="container">
      <a href="{{ Helper::env_url('/auth/facebook') }}" class="btn-facebook">Sign up with facebook</a>
      <p class="separator">or sign up with email</p>
      <form role="form" method="POST" action="{{ Helper::env_url('/register') }}">
          {{ csrf_field() }}
          <input id="firstname" placeholder="firstname" type="text" name="firstname" value="{{ old('firstname') }}">
          <input id="lastname" placeholder="lastname" type="text" name="lastname" value="{{ old('lastname') }}">
          <input id="email" placeholder="email" type="email" name="email" value="{{ old('email') }}">
          <input id="password" placeholder="password" type="password" name="password">
          <input id="password-confirm" placeholder="confirm password" type="password" name="password_confirmation">
          <button type="submit" class="btn-light">Sign up</button>    
      </form>
      <p class="redirect">Wait! I do have an account!<p>
  </div>
</div>
