<?php
include "layout/header.php";

require "vendor/TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;


    $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);

    $tweets = $connectionOauth->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=omryazir&count=2");
    print_r( $tweets );


include "layout/footer.php";
