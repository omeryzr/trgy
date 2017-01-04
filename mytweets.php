<?php
include "layout/header.php";

require "vendor/TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;



$accessToken = $_SESSION['access_token'];
$connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
$connectionOauth->setTimeouts(30, 30);


$username = 'omryazir';


$tweets = $connectionOauth->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count=2")

foreach ($tweets->users as $tweet) {
    echo "<h3>$text</h3>";
  }

  include "layout/footer.php";
