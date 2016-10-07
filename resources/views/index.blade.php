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
          <?php $i = 1; ?>
          @foreach($banners as $blogpost)
            <a href="{{ Helper::env_url('/blogposts/'.$blogpost->id) }}">
                <div class="gradient color{{$i}}">
                    <p>{{$blogpost->title}}</p>
                </div>
                <div class="banner"></div>
                <style>
                  #index .article-banners a:nth-child({{$i}}) .banner {
                    background-image: url("{{'../images/articles/'.$blogpost->image_name}}");
                  }
                </style>
            </a>
            <?php $i = $i + 1; ?>
          @endforeach
        </div>
        
        
        {{-- no a-href tag here!!!  --}}
        <div class="categories">
            <div class="area">
                {{-- <div class="icon"></div> --}}
                <p>featured</p>
            </div>
          @foreach($categories as $category)
            <div class="area">
                {{-- <div class="icon"></div> --}}
                <p>{{$category->name}}</p>
            </div>
          @endforeach
        </div>    
        
        <div class="article-posts">
            <div class="left">
                <?php $i = 1; ?>
                @foreach($blogpost_list as $blogpost)
                  <a href="{{ Helper::env_url('/blogposts/'.$blogpost->id) }}">
                      <style>
                        #index .article-posts .left a:nth-child({{$i}}) .image {
                          background-image: url("{{'../images/articles/'.$blogpost->image_name}}");
                        }
                      </style>
                      <div class="article">
                          <div class="image"></div>
                          <div class="info">
                              <p class="category">{{$blogpost->category->name}}</p>
                              <p class="title">{{$blogpost->title}}</p>
                              <p class="intro">{{$blogpost->intro}}</p>
                              <div class="author"></div>
                          </div>
                      </div>
                  </a>
                 <?php $i = $i + 1; ?>
                @endforeach
            </div>
            
            <div class="right">
                <div class="container">    
                    <p>POPULAR POSTS</p>
                    <?php $i = 1; ?>
                    @foreach($popular_posts as $blogpost)
                      <a href="{{ Helper::env_url('/blogposts/'.$blogpost->id) }}">
                          <style>
                            #index .article-posts .right div a:nth-child({{$i}}) .article {
                              background-image: url("{{'../images/articles/'.$blogpost->image_name}}");
                            }
                          </style>
                          <div class="article">
                              <div class="window">
                                  <div>{{$i}}</div>
                                  <p>{{$blogpost->title}}</p>
                              </div>
                          </div>
                      </a>
                      <?php $i = $i + 1; ?>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>

@endsection
