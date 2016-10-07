@extends('master')

@section('content')
  <div id="write-blogpost">
    <form role="form" method="POST" action="{{ Helper::env_url($form_route) }}" enctype="multipart/form-data">
      <div class="banner">
          @if ($blogpost->image_name)
            <style>
              .banner {background-image: url("{{'../images/articles/'.$blogpost->image_name}}")}
            </style>
          @else
            <style>
              .banner {background-image: url("{{'../images/articles/article1.png'}}")}
            </style>
          @endif
          <img src=""/>
          <div class="img-upload-box"><div class="icon"><input id="file" type="file" name="file"></div></div>
          @include('blogpost/category-popup')
          <div class="blogpost-info">
              <div>
                  <p class="category">{{$blogpost->category->name}}</p>
              </div>
              <p class="title editable-no-toolbar">{{$blogpost->title}}</p>
              <div>
                  <div class="profile"></div><p>by <span>{{Auth::user()->fullname}}</span></p>
              </div>
          </div>
      </div>
      <div class="content">
        <div class="editable-no-toolbar intro">{{$blogpost->intro}}</div>
        <div class="editable body">{!!$blogpost->body!!}</div>
      </div>
      {{ csrf_field() }}
      @if($request_type == 'PATCH')
        {{ method_field('PATCH') }}
      @endif
      {{-- <input id="title" placeholder="title" type="text" name="title" value="{{ (old('title') != '') ? old('title') : $blogpost->title }}">
      <input id="intro" placeholder="intro" type="text" name="intro" value="{{ (old('intro') != '') ? old('intro') : $blogpost->intro }}">
      <textarea id="body" placeholder="body" name="body" rows="8" cols="40">{{ (old('body') != '') ? old('body') : $blogpost->body }}</textarea>
     --}}
     
      <input id="category" name="category" type="hidden">
      <input id="title" name="title" type="hidden">
      <input id="intro" name="intro" type="hidden">
      <input id="body" name="body" type="hidden">
      
      <button type="submit" class="btn-dark">{{$button_text}}</button>                
    </form>
  </div> 
@endsection
