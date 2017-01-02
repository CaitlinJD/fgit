<?php

class raw_facebook_build extends facebook_call {

  public $facebook_roll;

  public function __construct(){
    $this->facebook_roll = parent::get_facebook_data();
  }

  public function build_facebook_post () {
    $facebook_array = $this->facebook_roll->posts->data;
    $item = array();
   
     foreach ($facebook_array as $facebook_post) {

      $item['title'] = $facebook_post->message;
      $item['content'] = $facebook_post->message;
      $item['facebook_post_image'] = $facebook_post->full_picture;
      $item['facebook_post_story'] = $facebook_post->story;
      $item['facebook_post_id'] = $facebook_post->id;
      $item['facebook_post_url'] =  "https://www.facebook.com/".$facebook_post->id;
      $post = new facebook_to_post;
      $post->facebook = $item;
      $post->import_facebook_posts();
      

    } 
  }
}
