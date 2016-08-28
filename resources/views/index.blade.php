@extends('master')

{{-- @section('head')
<style>
  @foreach($blogposts as $blogpost)
  .post{{$blogpost->id}} {
    background-image: url("{{'/images/blog_banners/'.$blogpost->image_name}}");
  }
  @endforeach
</style>
@endsection --}}


@section('content')
    <div id="index">
        <div class="article-banners">
          <?php
          $i = 0;
          ?>
          @foreach($banners as $blogpost)
            <div class="element">
                <div class="gradient color{{$i}}">
                    <p>{{$blogpost->title}}</p>
                </div>
                <div class="banner"></div>
                <style>
                  #index .article-banners element:nth-child({{$i}}) {
                    background-image: url("{{'/images/blog_banners/'.$blogpost->image_name}}");
                  }
                </style>
            </div>
            <?php
            $i = $i + 1;
            ?>
          @endforeach
        </div>
        
        <div class="categories">
            <div class="area">
                <div class="icon"></div>
                <p>featured</p>
            </div>
          @foreach($categories as $category)
            <div class="area">
                <div class="icon"></div>
                <p>{{$category->name}}</p>
            </div>
          @endforeach
        </div>    
        
        <div class="article-posts">
            <div class="left">
                @foreach($blogpost_list as $blogpost)
                  <div class="article">
                      <div class="image"></div>
                      <div class="info">
                          <p class="category">{{$blogpost->category->name}}</p>
                          <p class="title">{{$blogpost->title}}</p>
                          <p class="intro">{{$blogpost->intro}}</p>
                          <div class="author"></div>
                      </div>
                  </div>
                @endforeach
            </div>
            
            <div class="right">
                <div class="container">    
                    <p>POPULAR POSTS</p>
                    <?php
                      $i = 1;
                    ?>
                    @foreach($popular_posts as $blogpost)
                      <div class="article">
                          <div class="window">
                              <div>{{$i}}</div>
                              <p>{{$blogpost->title}}</p>
                          </div>
                      </div>
                      <?php
                        $i = $i + 1;
                      ?>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>

@endsection
