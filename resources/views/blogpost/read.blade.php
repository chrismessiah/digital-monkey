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
                    $(document).ready(function() {
                      var timestamp = moment('{{$blogpost->created_at}}', 'YYYY-MM-DD hh:mm:ss').fromNow().toLowerCase();
                      $('.timestamp').html(timestamp);
                    });
                  </script>
                  <div class="profile"></div><p>by <span>{{$blogpost->author->fullname}}</span> - Posted <span class="timestamp"></span></p>
              </div>
          </div>
      </div>
      <div>
          <div class="social">
              <div class="twitter"></div>
              <div class="facebook"></div>
              <div class="google-plus"></div>
          </div>
          <div class="content-wrapper">
              {{-- how the heck do i store ??? --}}
              <p class="intro">The further you get in your career, the harder it is to pinpoint — and then do something about — your personal and professional shortcomings.</p>
              <p>The Iphone is staggeringly popular, although it hasn’t really come as much of a surprise – you only have to consider the Ipod as proof of Apple’s dominance with such gadgets. If you are lucky enough to be one of the early Iphone owners, check out these resources to help you get some free Iphone games.<br><br>1-It’s one of the most obvious ways to find anything these days, but a simple google search can yield excellent results when you are looking for places to get your downloads. The downside of this is that after a little while you begin to realise that many of these sites have a few things in common. The trouble is that the sites that make themselves the most accessible in this way are the ones that are simply looking to make money with their advertising. They get paid for you to click on their ads, so it’s in their interest to drag as many visitors as possible into their site, and for this reason you’ll find that many of them offer no real downloads at all.</p>
              <p class="title">The shortcomings you can’t see</p>
              <p>2-There is a slight variation on the sites above, in that they will offer a couple of Iphone downloads, whether they be games or movies or wallpapers or whatever, but they will be very old and dated, and in many cases once you complete the download you’ll find it doesn’t work anyway. The point of this is, you guessed it, just to attract visitors who may then click on the advertising and make some money. Not exactly a noble business model, but I guess it works as there seem to be enough sites like that around!</p>
              <p class="qoute">If you think, “Sure, but that’s just who I am” — that’s a derailer too.</p>
              <p>3-The most obvious place for you to look when downloading just about anything these days is the torrent sites, peer to peer sites, or file sharing sites, or whatever they are called this week. I’m sure you know the ones-huge download collections, completely illegal to use, and yet it seems like everyone knows someone who has gone download crazy and downloaded huge amounts of things from there. Avoid these sites like the plague. It’s illegal to use them in most places, and also there are usually a fair amount of viruses etc to be found within their databases. Not cool!</p>
          </div>
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
