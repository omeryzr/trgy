<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

	// sıfını başlatalım
	$twitter = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

	// tw - kullanıcı adı
	$username = 'tayfunerbilen';

	// tw sayısı
	$count = 5;

	$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=twitterapi&count=2');

	print_r($tweets);

  include "layout/footer.php";
