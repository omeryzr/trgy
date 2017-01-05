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

	$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count='.$count);

	foreach ( $tweets as $tweet ){

		$id = $tweet->id_str;
		$text = $tweet->text;
		$created_at = date("Y-m-d H:i:s", strtotime($tweet->created_at));

		echo '<a href="https://twitter.com/'.$username.'/statuses/'.$id.'" target="_blank">
			'.nl2br($text).'<br />
			'.$created_at.' - #'.$id.'
		</a>
		<hr />';

	}
