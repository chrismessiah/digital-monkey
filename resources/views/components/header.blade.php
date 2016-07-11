<div id="head-div">
	<nav class="left">
		<a id="kth-logo-link" href="/"><div id="kth-logo"></div></a>
	</nav>
	
	<nav class="right">
		@if (Auth::guest()) {{-- Not logged in --}}
			<a href="/register">Register</a>
			<a href="/login">Log in</a>
		@else {{-- logged in --}}
			<div class="dropdown">
				<div class="dropdown-header">
					<div class="profile-pic"></div> <p>{{Auth::user()->firstname}}</p>
					<style>
						.profile-pic {	
							/* should be done in the user model so we can use Auth::user->pic instead */
							@if ( file_exists('images/profile_pics/'.Auth::user()->username.'.jpg') )
								background-image: url("{{ asset('images/profile_pics/'.Auth::user()->username.'.jpg') }}");
							@else
								background-image: url("{{ asset('images/profile_pics/example.jpg') }}");
							@endif	
						}
					</style>
				</div>
				<div class="content">
					<a href="">Post</a>
					<a href="">Preferences</a>
					<a href="{{ url('/logout') }}">Logout</a>
				</div>
			</div>
		@endif
		
		{{-- <a href=""><p id="head_menu4">Change to Swedish</p></a> --}}
	</nav>
</div>
