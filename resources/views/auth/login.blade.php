@extends('master')


@section('content')
<div class="login-page-container">
    <div class="login_wrapper">
        <form role="form" method="POST" action="{{ url('/login') }}">
            <div>
                {{ csrf_field() }}
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="email">
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
