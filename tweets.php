<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  $tweets = $connectionOauth->get('https://api.twitter.com/1.1/search/tweets.json?q=merhaba&result_type=recent&count=20');

  foreach ($tweets->statuses as $key => $tweet) {
    echo "$tweet->text";
 }
  include "layout/footer.php";
