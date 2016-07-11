@extends('master')

@section('head')
  <style>
  #article_banner {
    background-image: url("{{'/images/blog_banners/'.$image_name}}")
  }
  </style>
@endsection

@section('content')
  <div class="blogpost-container">
    <div id="article_banner"></div>

    <div id="content">
      <p id="title">{{$title}}</p>
      <p id="intro">{{$intro}}</p>
      <p id="body">{!!$body!!}</p>
    </div>
    <div id="social">
      <a href="" id="twitter"></a>
      <a href="" id="facebook"></a>
      <a href="" id="google"></a>
    </div>
    @if (Auth::user()->id == $author || Auth::user()->is_admin)
      <a class="btn" href="{{ url('/blogpost/'.$id.'/edit') }}">Edit</a>
    @endif
  </div>
@endsection
