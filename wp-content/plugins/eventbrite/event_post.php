<?php

class event_post extends event_call {
  public $event;
  public $post_id;

    public function Generate_Featured_Image( $image_url  ){
        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($image_url);
        $filename = basename($image_url);
        if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
        else                                    $file = $upload_dir['basedir'] . '/' . $filename;
        file_put_contents($file, $image_data);

        $wp_filetype = wp_check_filetype($filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, $file, $this->post_id );
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
        $res2= set_post_thumbnail( $this->post_id, $attach_id );
    }

  public function update_event_post () {
    
    foreach ($this->event as $meta_key => $value) {
      if ($meta_key !== 'content' || 'title') {
        update_post_meta($this->post_id,$meta_key,$value);
      }
    }
    //echo $this->event["logo"]." // ".$this->post_id."<br>";
      //self::Generate_Featured_Image ($this->event['logo']);

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
      self::Generate_Featured_Image ($this->event['logo']);
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
