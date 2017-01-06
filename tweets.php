<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $tweet->setTimeouts(30, 30);

  $q = "muzyka";
	$users = $tweet->get('users/search', array('q' => $q));
  print_r($users);


  include "layout/footer.php";
