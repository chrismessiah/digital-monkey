<div class="sign-in">	
  <p class="title">Sign in</p>
  <div class="container">
      <a href="{{ Helper::env_url('/auth/facebook') }}" class="btn-facebook">Login with facebook</a>
      <p class="separator">or</p>
      <form role="form" method="POST" action="{{ Helper::env_url('/login') }}">
          {{ csrf_field() }}
          <input id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}">
          <input id="password" type="password" name="password" placeholder="password">

          {{-- <p>Remember me?</p><input type="checkbox" name="remember"> --}}
          {{-- <a href="{{ Helper::env_url('/password/reset') }}">Forgot Password?</a> --}}
          <button type="submit" class="btn-light">Login with email</button>
      </form>
      <p class="redirect">Don't have an account yet?</p>
  </div>
</div>
