@extends('master')

@section('content')
<div class="reset-password-container">        
    <form role="form" method="POST" action="{{ Helper::env_url('/password/reset') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <input id="email" placeholder="email" type="email" name="email" value="{{ $email or old('email') }}">
        <input id="password" placeholder="password" type="password" name="password">
        <input id="password-confirm" placeholder="confirm" type="password" name="password_confirmation">
        <button type="submit" class="btn">Set Password</button>
    </form>
</div>
@endsection
