<?php

class twitter_to_post extends twitter_call {

  public $tweet;
  public $post_id;

  public function update_tweet () {

    foreach ($this->tweet as $meta_key => $value) {
      if ($meta_key !== 'content' || 'title') {
        update_post_meta($this->post_id,$meta_key,$value);
      }
    }
  }
  public function create_tweet () {
    $post_id = wp_insert_post(
      array(
        'post_title'		=> $this->tweet["title"],
        'post_content'  => $this->tweet["content"],
        'post_status'		=> 'publish',
      )
    );
    $this->post_id = $post_id;
    wp_set_object_terms($this->post_id, 'twitter', 'category', false);
    self::update_tweet();
  }
  public function import_tweets () {
    $args = array(
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'tweet_id',
          'value' => $this->tweet['tweet_id'],
        )
      )
    );
    $query = new wp_query($args);
    if ( $query->have_posts() ){
      while ( $query->have_posts() ) : $query->the_post();
        $this->post_id = get_the_ID();
        self::update_tweet();
      endwhile;
    }else {
      self::create_tweet();
    }
  }
}
