<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $tweet->setTimeouts(30, 30);

  function podpowiedzi($tweet, $q = "muzyka"){
	$users = $tweet->get('users/search', array('q' => $q));
	$a = json_decode($users, true);
	echo "<pre>";
	//print_r($a);
	foreach ($a as $key => $user) {
		echo $user['screen_name']." ".$user['id']." Follow user <br>";
		$ret = $tweet->post('friendships/create', array('user_id' => $user['id']));
	}
}
  include "layout/footer.php";
