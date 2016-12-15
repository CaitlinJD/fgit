<?php

class facebook_to_post extends facebook_call {

  public $facebook;
  public $post_id;

  public function update_facebook_post () {

    foreach ($this->facebook as $meta_key => $value) {
      if ($meta_key !== 'content' || 'title') {
        update_post_meta($this->post_id,$meta_key,$value);
      }
    }
  }
  public function create_facebook_post () {
    $post_id = wp_insert_post(
      array(
        'post_title'		=> $this->facebook["title"],
        'post_content'  => $this->facebook["content"],
        'post_status'		=> 'publish',
      )
    );
    $this->post_id = $post_id;
    wp_set_object_terms($this->post_id, 'facebook', 'category', false);
    self::update_facebook_post();
  }
  public function import_facebook_posts () {
    $args = array(
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'facebook_post_id',
          'value' => $this->facebook['facebook_post_id'],
        )
      )
    );
    $query = new wp_query($args);
    if ( $query->have_posts() ){
      while ( $query->have_posts() ) : $query->the_post();
        $this->post_id = get_the_ID();
      self::update_facebook_post();
      endwhile;
    }else {
      self::create_facebook_post();
    }
  }
}
