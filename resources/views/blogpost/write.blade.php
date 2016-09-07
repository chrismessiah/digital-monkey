@extends('master')

@section('content')
  <div id="write-blogpost">
    <p class="editable-intro">I'm the intro</p>
    <p class="editable-body">I'm the body!</p>
    <form role="form" method="POST" action="{{ Helper::env_url($route) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        {{-- <input id="title" placeholder="title" type="text" name="title" value="{{ (old('title') != '') ? old('title') : $blogpost->title }}">
        <input id="intro" placeholder="intro" type="text" name="intro" value="{{ (old('intro') != '') ? old('intro') : $blogpost->intro }}">
        <textarea id="body" placeholder="body" name="body" rows="8" cols="40">{{ (old('body') != '') ? old('body') : $blogpost->body }}</textarea>
        <input id="file" type="file" name="file"> --}}
        <button type="submit" class="btn">Update</button>                
    </form>
  </div> 
@endsection
