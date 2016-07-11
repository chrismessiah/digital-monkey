<div id="head-div">
	<a href="/"><div id="kth-logo"></div></a>
	<nav>
		@if (Auth::guest()) {{-- Not logged in --}}
			<a href="/register">Register</a>
			<a href="/login">Log in</a>
		@else {{-- logged in --}}
			<div class="dropdown">
				<div class="title">username</div>
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
