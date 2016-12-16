<?php
/* Plugin Name: Insta To Post

Plugin URI: http://wordpress.org/extend/plugins/test/
Version: 1.0.0
Author: cody collicott
Description: a plugin to create posts from events from Instagram CURL
Text Domain: test
License: GPLv3

*/

require_once("insta-build-data.php");
require_once("insta-build-post.php");

class insta_call {

  public $insta_url = "https://api.instagram.com/v1/users/324962268/media/recent?access_token=324962268.7b5a93d.78ef1bfa38bc45deb4642a95479d9ffc";


      public function get_insta_data() {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->insta_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);

        curl_close($ch);

         $insta_array = json_decode($output);
         return $insta_array;
      }
}
