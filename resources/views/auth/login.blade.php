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

                <p>Remember me?</p><input type="checkbox" name="remember">

                <div class="submit-container">
                    <button type="submit" class="btn login">Login</button>
                    <a class="btn reset" href="{{ url('/password/reset') }}">Reset Password?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
