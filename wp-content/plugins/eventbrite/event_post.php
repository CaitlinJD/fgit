<?php

class event_post extends event_call {
  public $event;
  public $post_id;
  public function update_event_post () {
    
    foreach ($this->event as $meta_key => $value) {
      if ($meta_key !== 'content' || 'title') {
        update_post_meta($this->post_id,$meta_key,$value);
      }
    }
      wp_set_object_terms( 128, 'past-events', 'eventcategory', false);

     // Updating event taxonomy
      $curdate=date('Y-m-d H:i:s');
      $eventdate = $this->event["events_meta_end_date"];

      if($curdate > $eventdate)
      {
          wp_set_object_terms($this->post_id, 'past-events', 'eventcategory', false);
      } else {
          wp_set_object_terms($this->post_id, 'upcoming-events', 'eventcategory', false);
      }

  }
  public function create_event_post () {
    $post_id = wp_insert_post(
      array(
        'post_title'		=> $this->event["title"],
        'post_content'  => $this->event["content"],
        'post_status'		=> 'publish',
        'post_type'		  => 'event'
      )
    );
    $this->post_id = $post_id;
    self::update_event_post();
  }
  public function import_events () {
    $args = array(
      'post_type' => 'event',
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'events_meta_id',
          'value' => $this->event['events_meta_id'],
        )
      )
    );
    $query = new wp_query($args);
    if ( $query->have_posts() ){
      while ( $query->have_posts() ) : $query->the_post();
        $this->post_id = get_the_ID();
        self::update_event_post();
      endwhile;
    }else {
      self::create_event_post();
    }
  }
}
