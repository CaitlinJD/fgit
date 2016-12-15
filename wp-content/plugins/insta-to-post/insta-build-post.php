<?php

class insta_to_post extends insta_call {

  public $insta;
  public $post_id;

  public function update_insta_post () {

    foreach ($this->insta as $meta_key => $value) {
      if ($meta_key !== 'content' || 'title') {
        update_post_meta($this->post_id,$meta_key,$value);
      }
    }
  }
  public function create_insta_post () {
    $post_id = wp_insert_post(
      array(
        'post_title'		=> $this->insta["title"],
        'post_content'  => $this->insta["content"],
        'post_status'		=> 'publish',
      )
    );
    $this->post_id = $post_id;
    wp_set_object_terms($this->post_id, 'instagram', 'category', false);
    self::update_insta_post();
  }
  public function import_insta_posts () {
    $args = array(
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'insta_post_id',
          'value' => $this->insta['insta_post_id'],
        )
      )
    );
    $query = new wp_query($args);
    if ( $query->have_posts() ){
      while ( $query->have_posts() ) : $query->the_post();
        $this->post_id = get_the_ID();
      self::update_insta_post();
      endwhile;
    }else {
      self::create_insta_post();
    }
  }
}
