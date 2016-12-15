<?php /* Template Name: Sand Box */ ?>

<?php
    function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }
  function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }

    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";


    $oauth_access_token = "24305766-brjaqdEK99qX6ARiZAcdhQk4HNRCgwIeGN9WHRakA";
    $oauth_access_token_secret = "GzkwH1NNPK3FcBHOC2OmnbsdmS2qGeWp9np2EGwvSg7DWg";
    $consumer_key = "ThRCM5NyZmE4T5SQHj6MPtM2K";
    $consumer_secret = "ynUdFNA4YNQSTpnN1kRdqeFNSL3g7n0pvzVIQOLqiG60wUyxRH";

    $oauth = array( 'oauth_consumer_key' => $consumer_key,
                    'oauth_nonce' => time(),
                    'oauth_signature_method' => 'HMAC-SHA1',
                    'oauth_token' => $oauth_access_token,
                    'oauth_timestamp' => time(),
                    'oauth_version' => '1.0');


    $base_info = buildBaseString($url, 'GET', $oauth);
    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;


    // Make requests
    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array( CURLOPT_HTTPHEADER => $header,
                      //CURLOPT_POSTFIELDS => $postfields,
                      CURLOPT_HEADER => false,
                      CURLOPT_URL => $url,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_SSL_VERIFYPEER => false);


    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);


    $twitter_data = json_decode($json);


    function getTwitterInfo($twitter_data){
       
        foreach ($twitter_data as $tweet) {
            $user_name = $tweet->user->name;
            $user_screen_name = $tweet->user->screen_name;
            $user_image = $tweet->user->profile_image_url;
            $tweet_text = $tweet->text;
            $tweet_media = $tweet->entities->media[0]->media_url;
        
        echo '<div class="tweet-div">';
        echo '<img class="user-pic" src="'.$user_image.'" />';
        echo '<h4>'.$user_name.'<span> '.$user_screen_name.'</span></h4>';
        echo "<p>".$tweet->text."<p>";
        if( !$tweet_media == ''){echo '<img style="height: 100px;" src="'.$tweet_media.'" />';};
        echo "</div>";


        }
       
            
    }

?>