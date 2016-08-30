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
									<div class="name">{{Auth::user()->getFirstname()}}</div>
							</div>
						@endif
				</div>
		</div>
		<div class="logged-in-dropdown">
			<div class="triangle"></div>
			<a href="{{Helper::env_url('/')}}">Make blogpost</a>
			<a href="{{Helper::env_url('/logout')}}">Log out</a>
		</div>
		<div class="login-dropdown">
				<div class="back"></div>
				<div class="logo"></div>
				
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
		</div>
</div>
