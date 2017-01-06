<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  function podpowiedzi($connectionOauth, $q = "muzyka"){
	$users = $connectionOauth->get('users/search', array('q' => $q));
	$a = json_decode($users, true);
	echo "<pre>";
	print_r($a);
	// foreach ($a as $key => $user) {
	// 	echo $user['screen_name']." ".$user['id']." Follow user <br>";
	// 	$ret = $connectionOauth->post('friendships/create', array('user_id' => $user['id']));
	// }
}

  include "layout/footer.php";
