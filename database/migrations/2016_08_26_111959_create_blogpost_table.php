<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogpostTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('blogposts');
        Schema::create('blogposts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('image_name', 70);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title', 50);
            $table->string('intro', 200);
            $table->text('body');
            $table->timestamps();
        });
        $this->insert_stuff();
    }
    
    private function insert_stuff() {
        $blogposts = array(
            array(
                'user_id' => 1,
                'image_name' => 'banner1.png',
                'category_id' => 1,
                'title' => '5 Tips For Offshore Software Development',
                'intro' => 'The further you get in your career, the harder it is to pinpoint — and then do something about — your personal and professional shortcomings.',
                'body' => 'The Iphone is staggeringly popular, although it hasn’t really come as much of a surprise – you only have to consider the Ipod as proof of Apple’s dominance with such gadgets. If you are lucky enough to be one of the early Iphone owners, check out these resources to help you get some free Iphone games.<br>1-It’s one of the most obvious ways to find anything these days, but a simple google search can yield excellent results when you are looking for places to get your downloads. The downside of this is that after a little while you begin to realise that many of these sites have a few things in common. The trouble is that the sites that make themselves the most accessible in this way are the ones that are simply looking to make money with their advertising. They get paid for you to click on their ads, so it’s in their interest to drag as many visitors as possible into their site, and for this reason you’ll find that many of them offer no real downloads at all.<br><h1>The shortcomings you can’t see</h1><br>2-There is a slight variation on the sites above, in that they will offer a couple of Iphone downloads, whether they be games or movies or wallpapers or whatever, but they will be very old and dated, and in many cases once you complete the download you’ll find it doesn’t work anyway. The point of this is, you guessed it, just to attract visitors who may then click on the advertising and make some money. Not exactly a noble business model, but I guess it works as there seem to be enough sites like that around!<br><qoute>If you think, “Sure, but that’s just who I am” — that’s a derailer too.</qoute><br>3-The most obvious place for you to look when downloading just about anything these days is the torrent sites, peer to peer sites, or file sharing sites, or whatever they are called this week. I’m sure you know the ones-huge download collections, completely illegal to use, and yet it seems like everyone knows someone who has gone download crazy and downloaded huge amounts of things from there. Avoid these sites like the plague. It’s illegal to use them in most places, and also there are usually a fair amount of viruses etc to be found within their databases. Not cool!'
            ), array(
                'user_id' => 2,
                'image_name' => 'banner1.png',
                'category_id' => 2,
                'title' => '5 Tips For Offshore Software Development',
                'intro' => 'The further you get in your career, the harder it is to pinpoint — and then do something about — your personal and professional shortcomings.',
                'body' => 'The Iphone is staggeringly popular, although it hasn’t really come as much of a surprise – you only have to consider the Ipod as proof of Apple’s dominance with such gadgets. If you are lucky enough to be one of the early Iphone owners, check out these resources to help you get some free Iphone games.<br>1-It’s one of the most obvious ways to find anything these days, but a simple google search can yield excellent results when you are looking for places to get your downloads. The downside of this is that after a little while you begin to realise that many of these sites have a few things in common. The trouble is that the sites that make themselves the most accessible in this way are the ones that are simply looking to make money with their advertising. They get paid for you to click on their ads, so it’s in their interest to drag as many visitors as possible into their site, and for this reason you’ll find that many of them offer no real downloads at all.<br><h1>The shortcomings you can’t see</h1><br>2-There is a slight variation on the sites above, in that they will offer a couple of Iphone downloads, whether they be games or movies or wallpapers or whatever, but they will be very old and dated, and in many cases once you complete the download you’ll find it doesn’t work anyway. The point of this is, you guessed it, just to attract visitors who may then click on the advertising and make some money. Not exactly a noble business model, but I guess it works as there seem to be enough sites like that around!<br><qoute>If you think, “Sure, but that’s just who I am” — that’s a derailer too.</qoute><br>3-The most obvious place for you to look when downloading just about anything these days is the torrent sites, peer to peer sites, or file sharing sites, or whatever they are called this week. I’m sure you know the ones-huge download collections, completely illegal to use, and yet it seems like everyone knows someone who has gone download crazy and downloaded huge amounts of things from there. Avoid these sites like the plague. It’s illegal to use them in most places, and also there are usually a fair amount of viruses etc to be found within their databases. Not cool!'
            ));
        for ($i=3; $i < 25; $i++) { 
            array_push($blogposts, array(
                'user_id' => 1,
                'image_name' => 'banner1.png',
                'category_id' => 1,
                'title' => $i." Tips For Offshore Software Development",
                'intro' => 'The further you get in your career, the harder it is to pinpoint — and then do something about — your personal and professional shortcomings.',
                'body' => 'The Iphone is staggeringly popular, although it hasn’t really come as much of a surprise – you only have to consider the Ipod as proof of Apple’s dominance with such gadgets. If you are lucky enough to be one of the early Iphone owners, check out these resources to help you get some free Iphone games.<br>1-It’s one of the most obvious ways to find anything these days, but a simple google search can yield excellent results when you are looking for places to get your downloads. The downside of this is that after a little while you begin to realise that many of these sites have a few things in common. The trouble is that the sites that make themselves the most accessible in this way are the ones that are simply looking to make money with their advertising. They get paid for you to click on their ads, so it’s in their interest to drag as many visitors as possible into their site, and for this reason you’ll find that many of them offer no real downloads at all.<br><h1>The shortcomings you can’t see</h1><br>2-There is a slight variation on the sites above, in that they will offer a couple of Iphone downloads, whether they be games or movies or wallpapers or whatever, but they will be very old and dated, and in many cases once you complete the download you’ll find it doesn’t work anyway. The point of this is, you guessed it, just to attract visitors who may then click on the advertising and make some money. Not exactly a noble business model, but I guess it works as there seem to be enough sites like that around!<br><qoute>If you think, “Sure, but that’s just who I am” — that’s a derailer too.</qoute><br>3-The most obvious place for you to look when downloading just about anything these days is the torrent sites, peer to peer sites, or file sharing sites, or whatever they are called this week. I’m sure you know the ones-huge download collections, completely illegal to use, and yet it seems like everyone knows someone who has gone download crazy and downloaded huge amounts of things from there. Avoid these sites like the plague. It’s illegal to use them in most places, and also there are usually a fair amount of viruses etc to be found within their databases. Not cool!'
            ));
        }
        foreach ($blogposts as $array) {
            $row = new App\Blogpost;
            $row->user_id = $array['user_id'];
            $row->image_name = $array['image_name'];
            $row->category_id = $array['category_id'];
            $row->title = $array['title'];
            $row->intro = $array['intro'];
            $row->body = $array['body'];
            $row->save();
            sleep(1);
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('blogposts');
    }
}
