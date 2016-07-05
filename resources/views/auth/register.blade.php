@extends('master')

@section('content')
<div class="register-page-container">     
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <input id="firstname" placeholder="firstname" type="text" name="firstname" value="{{ old('firstname') }}">
        <input id="lastname" placeholder="lastname" type="text" name="lastname" value="{{ old('lastname') }}">
        <input id="username" placeholder="username" type="text" name="username" value="{{ old('username') }}">
        <input id="email" placeholder="email" type="email" name="email" value="{{ old('email') }}">
        <input id="password" placeholder="password" type="password" name="password">
        <input id="password-confirm" placeholder="password again" type="password" name="password_confirmation">
        <button type="submit" class="btn">Register</button>                
    </form>
</div> 
@endsection
