@extends('master')

@section('head')
<style>
  @foreach($blogposts as $blogpost)
  .post{{$blogpost->id}} {
    background-image: url("{{'/images/blog_banners/'.$blogpost->image_name}}");
  }
  @endforeach
</style>
@endsection


@section('content')
  @foreach($blogposts as $blogpost)
    <a href="{{ url('/blogpost/read/'.$blogpost->id) }}">
      <div class="blogpost {{'post'.$blogpost->id}}">
        <p class="title">{{$blogpost->title}}</p>
        <p class="intro">{{$blogpost->intro}}</p>
      </div>
    </a>
  @endforeach
@endsection
