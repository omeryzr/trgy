<?php
include "layout/header.php";

require "vendor/TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;


    $bisebise = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);

    $username = 'omryazir';

    $tweets = $bisebise->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count=10");
    print_r( $tweets );


include "layout/footer.php";
