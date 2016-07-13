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
				</div>
				<div class="content">
					<a href="{{ Helper::env_url('blogposts/create') }}">Make blogpost</a>
					<a href="">Preferences</a>
					@if (Auth::user()->is_admin)
						<a href="">Admin controls</a>
					@endif
					<a href="{{ Helper::env_url('logout') }}">Logout</a>
				</div>
			</div>
			
			<style>
				#head-div .profile-pic {	
						background-image: url("{{ Auth::user()->getPicUrl() }}");
				}
			</style>
		@endif
		
		{{-- <a href=""><p id="head_menu4">Change to Swedish</p></a> --}}
	</nav>
</div>
