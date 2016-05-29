@extends('master')


@section('content')
  <div id="article_banner"></div>

  <div id="article_body_wrapper">
    <p id="article_title">{{$title}}</p>
    <p id="article_intro">{{$intro}}</p>
    <p id="article_body">{{$body}}</p>
  </div>
  <div id="center_this">
    <a href="" id="share_social_twitter"></a>
    <a href="" id="share_social_facebook"></a>
    <a href="" id="share_social_google"></a>
  </div>
  <style>
    #center_this {
      margin: auto;
      width: 12%;
      margin-top: 50px;
      margin-bottom: 50px;

    }
    #share_social_twitter {
      background-image: url("/images/icons/twitter.png");
    }
    #share_social_facebook {
      background-image: url("/images/icons/facebook.png");
    }
    #share_social_google {
      background-image: url("/images/icons/google.png");
    }
    #share_social_twitter, #share_social_facebook, #share_social_google {
      width: 35px;
      height: 35px;
      background-size: 35px;
      display: inline-block;
      margin: 5px;
    }
    #article_banner {
      width: 100%;
      height: 400px;
      background-image: url("{{'/images/blog_banners/'.$image_name}}");
      background-size: 100% 400px;
    }
    #article_title, #article_body, #article_intro {
      font-family: Times;
    }
    #article_title {
      font-size: 30px;
      text-align: center;
    }
    #article_body {
      font-size: 14px;
      margin-bottom: 50px;
    }
    #article_intro {
      font-size: 20px;
      text-align: center;
    }
    #article_body_wrapper {
      margin: auto;
        width: 60%;
    }
  </style>

@endsection
