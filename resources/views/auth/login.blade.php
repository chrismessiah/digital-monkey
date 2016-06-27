@extends('master')

{{-- @section('head')
<link rel="stylesheet" href="/css/login.css">
@endsection --}}

@section('content')
<div id="login-bg">
    <div id="login_wrapper">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            <div>
                {{ csrf_field() }}
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="username">
                <input id="password" type="password" name="password" placeholder="password">
            </div>

            <div>
                <p>Remember me?</p><input type="checkbox" name="remember">
            </div>

            <div>
                <button type="submit" class="btn">Login</button>
                <a class="btn" href="{{ url('/password/reset') }}">Reset Password?</a>
            </div>
        </form>
    </div>
</div>
@endsection
