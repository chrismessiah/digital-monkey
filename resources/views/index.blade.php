@extends('master')

@section('content')

  @foreach($blogposts as $blogpost)
    <a href="/blogpost/{{$blogpost->id}}">
      <div class="blogpost {{'post'.$blogpost->id}}">
        <p class="blog-title">{{$blogpost->title}}</p>
        <p class="blog-intro">{{$blogpost->intro}}</p>
      </div>
    </a>
    <style>
      .post{{$blogpost->id}} {
        background-image: url("{{'/images/blog_banners/'.$blogpost->image_name}}");
      }
    </style>
  @endforeach

  <style>
    .blogpost {
      height: 400px;
      background-size: 100% 400px;
      background-repeat: no-repeat;
    }
    .blogpost > p {
      position: relative;
      left: 40px;
      top: 30px;
      font-family: Helvetica;
      color: #FFFFFF;
      padding-bottom: 20px;
    }
    .blog-title {
      font-size: 40px;
    }
    .blog-intro {
      font-size: 22px;
    }
    a {
      text-decoration: none;
    }
  </style>
@endsection
