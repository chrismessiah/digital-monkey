@extends('master')

@section('content')
  <div class="write-blogpost-page-container">     
      <form role="form" method="POST" action="{{ url('/blogpost/publish') }}">
          {{ csrf_field() }}
          <input id="title" placeholder="title" type="text" name="title" value="{{ old('title') }}">
          <input id="intro" placeholder="intro" type="text" name="intro" value="{{ old('intro') }}">
          <textarea id="body" placeholder="body" name="body" rows="8" cols="40"></textarea>
          <button type="submit" class="btn">Post</button>                
      </form>
  </div> 
@endsection
