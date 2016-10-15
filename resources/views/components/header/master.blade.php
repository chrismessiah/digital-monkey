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
    @if (Auth::guest())
      @include('components.header.login-dropdown.master')
    @else
      @include('components.header.logged-in-dropdown')
    @endif
</div>
