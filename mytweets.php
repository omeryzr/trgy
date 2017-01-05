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

  $followers = $connectionOauth->get("followers/list" , array('count' => 200));

	print_r ($followers);

include "layout/footer.php";
