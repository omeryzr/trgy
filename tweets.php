<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  $url = 'https://api.twitter.com/1.1/search/tweets.json';
  $requestMethod = 'GET';
  $getfield = '?q=#baseball&result_type=recent';

// Perform the request
  $twitter = new TwitterAPIExchange($settings);
  echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
  include "layout/footer.php";
