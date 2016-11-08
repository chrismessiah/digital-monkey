<div class="logged-in-dropdown">
  <div class="triangle"></div>
  <a href="{{Helper::env_url('/blogposts/write')}}">Make blogpost</a>
  <form action="{{ Helper::env_url('/logout') }}" method="POST">
    {{ csrf_field() }}
    <button type="submit">Log out</button>
  </form>
  {{-- <a href="{{Helper::env_url('/logout')}}">Log out</a> --}}
</div>
