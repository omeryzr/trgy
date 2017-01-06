<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  $q = "muzyka";
	$users = $connectionOauth->get('users/search', array('q' => $q));

  foreach ( $users as $user ){
  $name = $user->name;
  echo "$id";
  }

  include "layout/footer.php";
