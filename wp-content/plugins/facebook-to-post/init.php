<?php
/* Plugin Name: Facebook To Post

Plugin URI: http://wordpress.org/extend/plugins/test/
Version: 1.0.0
Author: cody collicott
Description: a plugin to create posts from events from facebook CURL
Text Domain: test
License: GPLv3

*/

require_once("facebook-build-data.php");
require_once("facebook-build-post.php");

class facebook_call {

  public $url = "https://graph.facebook.com/v2.8/44589077752?fields=id%2Cname%2Cposts%7Bfull_picture%2Cmessage%2Ccaption%2Ccreated_time%2Cdescription%2Cstory%7D&access_token=EAAZAQVlvh2tQBAHI6WQZCJ5g31MNDNbSBAN7AE21mgLylCEMHina0d2q0Cfc1jsAaKO1WImoknQiItN0s5gsmox0HbDyIcD0KNRH23ByMqM6HTWnd6VCNk1PO32zwQ3LnWXUBkZCIDL21mxPcd5fcX7rQKUeQKZBV35uoXBazAZDZD";


      public function get_facebook_data() {
       $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);

        curl_close($ch);

         $facebook_data = json_decode($output);
         return $facebook_data;
      }
}
