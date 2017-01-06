<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  $tweets = $connectionOauth->get("search/tweets" , array('count' => 200));

  $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
  $getfield = '?screen_name=j7mbo';
  $requestMethod = 'GET';

  $twitter = new TwitterAPIExchange($settings);
  $response = $twitter->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();

  var_dump(json_decode($response));

}

  include "layout/footer.php";
