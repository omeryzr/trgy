<?php
include "layout/header.php";

require "vendor/TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

if (!isset($_SESSION['access_token'])) {
    include 'login.php';
}
else
{
    $accessToken = $_SESSION['access_token'];
    $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
    $connectionOauth->setTimeouts(30, 30);

    $tweets = $connectionOauth->get("statuses/user_timeline" , array('count' => 200));

    foreach ($tweets as $tweet) {
        echo "
                <h3>$tweet->text</h3>
            ";
    }

}

include "layout/footer.php";
