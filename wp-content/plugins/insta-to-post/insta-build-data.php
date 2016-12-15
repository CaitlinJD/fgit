<?php

class raw_insta_build extends insta_call {

  public $insta_roll;

  public function __construct(){
    $this->insta_roll = parent::get_insta_data();
  }

  public function build_insta_post () {
    $insta_data = $this->insta_roll->data;
    $item = array();
   
     foreach ($insta_data as $insta_post) {

      $item['title'] = $insta_post->caption->text;
      $item['content'] = $insta_post->images->standard_resolution->url;
      $item['insta_post_id'] = $insta_post->id;
      $item['insta_post_likes'] = $insta_post->likes->count;
      $item['insta_post_url'] =  $insta_post->link;

      $post = new insta_to_post;
      $post->insta = $item;
      $post->import_insta_posts();
      

    } 
  }
}
