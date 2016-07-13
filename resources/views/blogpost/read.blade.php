@extends('master')

@section('head')
  <style>
  #article_banner {
    background-image: url("{{'/images/blog_banners/'.$blogpost->image_name}}")
  }
  </style>
@endsection

@section('content')
  <div class="blogpost-container">
    <div id="article_banner"></div>

    <div id="content">
      <p id="title">{{$blogpost->title}}</p>
      <p id="intro">{{$blogpost->intro}}</p>
      <p id="body">{!!$blogpost->body!!}</p>
      
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
    @if ($blogpost->check_if_author())
      <a href="{{ Helper::env_url('/blogposts/'.$blogpost->id.'/edit') }}" class="btn">Edit</a>
      <form method="POST" action="{{ Helper::env_url('/blogposts/'.$blogpost->id) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn">Delete</button>
      </form>
    @endif
  </div>
@endsection
