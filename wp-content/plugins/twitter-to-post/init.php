<?php
/* Plugin Name: Twitter to post

Plugin URI: http://wordpress.org/extend/plugins/test/
Version: 1.0.0
Author: cody collicott
Description: a plugin to create posts from events from twitter CURL
Text Domain: test
License: GPLv3

*/

require_once("twitter-build-data.php");
require_once("twitter-build-post.php");

class twitter_call {

  public $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
  public $oauth;

  public function __construct(){
    $oauth_access_token = "808742526408650752-k2ypR78lVm2TnjgPTGwUN0HZe3Sb3uq";
    $oauth_access_token_secret = "WLXE3MGGaSjMSWEXfIJn54neYZybcIAkc4hqI5AxjqkNF";
    $consumer_key = "ipRVc41UjhzNeiXPEahYBrSlJ";
    $consumer_secret = "CNYfNPBsPiXEqB4l4GyAW3BfCPCtENDToDha88smAaTxawAP6Q";

    $oauth = array( 'oauth_consumer_key' => $consumer_key,
                    'oauth_nonce' => time(),
                    'oauth_signature_method' => 'HMAC-SHA1',
                    'oauth_token' => $oauth_access_token,
                    'oauth_timestamp' => time(),
                    'oauth_version' => '1.0'
    );
    $this->oauth = $oauth;
    $base_info = self::buildBaseString();
    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;
    $this->oauth = $oauth;

  }

  public function buildBaseString() {
    $r = array();
    ksort($this->oauth);
    foreach($this->oauth as $key=>$value){
      $r[] = "$key=" . rawurlencode($value);
    }
    return "GET&" . rawurlencode($this->url) . '&' . rawurlencode(implode('&', $r));
  }

  public function buildAuthorizationHeader() {
    $r = 'Authorization: OAuth ';
    $values = array();
    if ( is_array($this->oauth) ) {
      foreach($this->oauth as $key=>$value) {
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
      }
      $r .= implode(', ', $values);
      return $r;
    }
  }


  public function get_raw_data() {

    $header = array(self::buildAuthorizationHeader(), 'Expect:');
    $options = array(
      CURLOPT_HTTPHEADER => $header,
      CURLOPT_HEADER => false,
      CURLOPT_URL => $this->url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false
    );

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);

    $twitter_data = json_decode($json);
    return $twitter_data;
  }
}
