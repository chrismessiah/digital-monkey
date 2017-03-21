@extends('master')

@section('head')
  <meta name="robots" content="noindex">
@endsection

@section('content')
<div class="reset-password-request-container">
    <form role="form" method="POST" action="{{ Helper::env_url('/password/email') }}">
        {{ csrf_field() }}
        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="email">
        <button type="submit" class="btn">Send Password Reset Link</button>
    </form>
</div>
@endsection
