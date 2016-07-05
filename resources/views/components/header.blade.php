<div id="head-div">
	<a href="/"><div id="kth-logo"></div></a>
	<nav>
		@if (Auth::guest()) {{-- Not logged in --}}
			<a href="/register">Register</a>
			<a href="/login">Log in</a>

		@else {{-- logged in --}}
			<a href="">Control Panel</a>
			<a href="{{ url('/logout') }}">Logout</a>
		@endif
		
		{{-- <a href=""><p id="head_menu4">Change to Swedish</p></a> --}}
	</nav>
</div>
