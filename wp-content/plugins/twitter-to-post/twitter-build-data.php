<?php

class raw_twitter_build extends twitter_call {

  public $twitter_roll;

  public function __construct(){
    parent::__construct();
    $this->twitter_roll = parent::get_raw_data();
  }

  public function build_tweet () {

    $item = array();
    foreach ($this->twitter_roll as $tweet) {

      $item['title'] = $tweet->text;
      $item['content'] = $tweet->text;
      $item['tweet_display_name'] = $tweet->user->name;
      $item['tweet_user_name'] = $tweet->user->screen_name;
      $item['tweet_display_pic'] = $tweet->user->profile_image_url;
      $item['tweet_media_url'] = $tweet->entities->media[0]->media_url;
      $item['tweet_id'] = $tweet->id_str;
      $item['tweet_url'] =  "https://twitter.com/statuses/".$tweet->id_str;

      $post = new twitter_to_post;
      $post->tweet = $item;
      $post->import_tweets();
      

    }
  }
}
