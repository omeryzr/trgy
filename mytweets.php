<?php

	header('Content-type: text/html; charset=utf8');

  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

	// consumer ve access
	$consumer_key = 'NO1Cq2gZp2iFftrsAFKh3YAik';
	$consumer_secret = 'BtQUruyX0GcqMMwcQnAVjh1FvbNRc2mRXVi67fEp0DQZDeIVFA';
	$access_token = '3329469442-P50kd40f7BRT66NErXaoBjbPalQJldsT5HORTsR';
	$access_token_secret = 'r84D7FTBRySlvraboNOjUJGnieS3retJ0KqZeKDi8EBzV';

	// sıfını başlatalım
	$twitter = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

	// tw - kullanıcı adı
	$username = 'omryazir';

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

include "layout/footer.php";
