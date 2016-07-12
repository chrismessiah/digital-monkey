@extends('master')


@section('content')
<div class="login-page-container">
    <div class="login_wrapper">
        <form role="form" method="POST" action="{{ secure_url('/login') }}">
            {{ csrf_field() }}
            <input id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}">
            <input id="password" type="password" name="password" placeholder="password">

            {{-- <p>Remember me?</p><input type="checkbox" name="remember"> --}}
            {{-- <a href="{{ secure_url('/password/reset') }}">Forgot Password?</a> --}}

            <button type="submit" class="btn btn-login">Login with email</button>
            <a href="{{ secure_url('/auth/facebook') }}" class="btn btn-facebook">Login with facebook</a>
            
            
        </form>
    </div>
</div>
@endsection
