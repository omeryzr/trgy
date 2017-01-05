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

	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23freebandnames&since_id=24012619984051000&max_id=250126199840518145&result_type=mixed&count=4');

	print_r($tweets);

  include "layout/footer.php";
