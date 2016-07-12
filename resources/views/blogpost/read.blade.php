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
      <form method="POST" action="{{ url('/blogpost/'.$id.'/edit') }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <button type="submit" class="btn">Edit</button>
      </form>
      <form method="POST" action="{{ url('/blogpost/'.$id.'/delete') }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn">Delete</button>
      </form>
    @endif
  </div>
@endsection
