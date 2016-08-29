<div id="header">
		<div class="standard">
				<div class="left">
						<a href="{{ Helper::env_url('/') }}">
							<div class="logo"></div>
						</a>
				</div>
				
				<div class="right">
						<div class="search">
								<div class="icon"></div>
						</div>
						@if (Auth::guest()) {{-- Not logged in --}}
							<div class="login">Sign in / Sign up</div>
						@else {{-- logged in --}}
							<div class="user">
									<div class="container">
											<div class="icon"></div>
											<style>
												#header .user .icon {	
														background-image: url("{{ Auth::user()->getPicUrl() }}");
												}
											</style>
									</div>
									<div class="name">Chales</div>
							</div>
						@endif
				</div>
		</div>
		<div class="login-dropdown">
				<div class="back"></div>
				<div class="logo"></div>
				<p>Sign in / Sign up</p>
				<div class="container">
						<form role="form" method="POST" action="{{ Helper::env_url('/login') }}">
								{{ csrf_field() }}
								<input id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}">
								<input id="password" type="password" name="password" placeholder="password">

								{{-- <p>Remember me?</p><input type="checkbox" name="remember"> --}}
								{{-- <a href="{{ Helper::env_url('/password/reset') }}">Forgot Password?</a> --}}
								<button type="submit" class="btn-light">Login with email</button>
								<p class="separator">or</p>
								<a href="{{ Helper::env_url('/auth/facebook') }}" class="btn-facebook">Login with facebook</a>							
						</form>
				</div>
				<a href="{{ Helper::env_url('/register') }}">Don't have an account yet?</a>
		</div>
</div>
