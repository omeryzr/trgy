<?php
session_start();
include "config.php";

require "vendor/TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);

$username = 'omryazir';


$tweets = $twitter->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count=2")

foreach ($tweets as $tweet ) {
  $id = $tweet->id_str;
  $text = $tweet->text;
  $created_at = date("Y-m-d H:i:s", strtotime($tweet->created_at));
  echo "<a href='https://twitter.com/'.$username.'/statuses/'.$id.'>'.$text.'<br />
                    '.$created_at.' -#'.$id.'
  </a>";
}
