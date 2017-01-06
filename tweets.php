<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  $host = 'api.twitter.com';
      $method = 'GET';
      $path = '/1.1/search/tweets.json';  // api call path api.twitter.com/1.1/search/tweets.json

      $query = array( // query parameters
      'q' => '%bookmyshow',
      'count' => '2'
      );

      $oauth = array(
      'q' => '%bookmyshow',
      'count' => 2,
      'oauth_consumer_key' => $consumer_key,
      'oauth_nonce' => time(),
      'oauth_signature_method' => 'HMAC-SHA1',
      'oauth_token' => $oauth_access_token,
      'oauth_timestamp' => time(),
      'oauth_version' => '1.1'
      );



      $oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
      $query = array_map("rawurlencode", $query);

      $arr = array_merge($oauth, $query); // combine the values THEN sort

      asort($arr); // secondary sort (value)
      ksort($arr); // primary sort (key)

      // http_build_query automatically encodes, but our parameters
      // are already encoded, and must be by this point, so we undo
      // the encoding step
      $querystring = urldecode(http_build_query($arr, '', '&'));

      $url = "https://$host$path";

      // mash everything together for the text to hash
      $base_string = $method."&".rawurlencode($url)."&".rawurlencode($querystring);

      // same with the key
      $key = rawurlencode($consumer_secret)."&".rawurlencode($token_secret);

      // generate the hash
      $signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

      // this time we're using a normal GET query, and we're only encoding the query params
      // (without the oauth params)
      $url .= "?".http_build_query($query);

      $oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
      ksort($oauth); // probably not necessary, but twitter's demo does it

      // also not necessary, but twitter's demo does this too
      function add_quotes($str) { return '"'.$str.'"'; }
      $oauth = array_map("add_quotes", $oauth);

      // this is the full value of the Authorization line
      $auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));
      $options = array(
      CURLOPT_HTTPHEADER => array("Authorization: $auth"),
      //CURLOPT_POSTFIELDS => $postfields,
      CURLOPT_HEADER => false,
      CURLOPT_URL => $url . '?q=bookmyshow&count=2',
      CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false
      );
      // do our business
      $feed = curl_init();
      curl_setopt_array($feed, $options);
      $json = curl_exec($feed);
      curl_close($feed);

      $twitter_data = json_decode($json);
      //print_r($twitter_data);
      echo "<pre>";
      print_r(json_decode($json));

  include "layout/footer.php";
