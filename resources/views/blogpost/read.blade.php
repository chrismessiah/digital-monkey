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
      
      <div class="author-container">
        <p class="header">Published by</p>
        <div class="profile-pic"></div> <p id="author">{{$author->fullname}}</p>
        <style>
          .blogpost-container .profile-pic {
            background-image: url("{{ $author->getPicUrl() }}");
          }
        </style>
      </div>
      
      <div class="social">
        <a href="" id="twitter"></a>
        <a href="" id="facebook"></a>
        <a href="" id="google"></a>
      </div>
      
    </div>
    @if (Auth::check() && (Auth::user()->id == $author->id || Auth::user()->is_admin))
      <a href="{{ Helper::env_url('/blogposts/'.$id.'/edit') }}" class="btn">Edit</a>
      <form method="POST" action="{{ Helper::env_url('/blogposts/'.$id) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn">Delete</button>
      </form>
    @endif
  </div>
@endsection
