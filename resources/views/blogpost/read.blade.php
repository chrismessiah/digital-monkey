@extends('master')


@section('content')  
  <div id="browse">
      <div class="banner">
          <div>
              <div>
                  <p class="category">{{$blogpost->category->name}}</p>
              </div>
              <p class="title">{{$blogpost->title}}</p>
              <div>
                  <script type="text/javascript">
                    var date = '{{$blogpost->created_at}}';
                  </script>
                  <div class="profile"></div><p>by <span>{{$blogpost->author->fullname}}</span> - Posted <span class="timestamp">Changed by js</span></p>
              </div>
          </div>
      </div>
      <div>
        <div class="social">
          <div class="twitter"></div>
          <div class="facebook"></div>
          <div class="google-plus"></div>
        </div>
            
        <p class="intro">{{$blogpost->intro}}</p>
        <div class="body">{!! $blogpost->body !!}</div>
        <hr/>
        <div class="author">
            <div class="left">
                <div class="profile-pic"></div>
            </div>
            <div class="right">
                <p>By {{$blogpost->author->fullname}}</p>
                <p>{{$blogpost->author->about}}</p>
            </div>
        </div>
      </div>
  </div>
@endsection
