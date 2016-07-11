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
					<div class="profile-pic"></div> <p>{{Auth::user()->getFirstname()}}</p>
					<style>
						.profile-pic {	
								background-image: url("{{ Auth::user()->getPicUrl() }}");
						}
					</style>
				</div>
				<div class="content">
					<a href="{{ url('/blogpost/write') }}">Make blogpost</a>
					<a href="">Preferences</a>
					<a href="{{ url('/logout') }}">Logout</a>
				</div>
			</div>
		@endif
		
		{{-- <a href=""><p id="head_menu4">Change to Swedish</p></a> --}}
	</nav>
</div>
