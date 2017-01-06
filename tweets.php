<?php
  include "layout/header.php";

  require "vendor/TwitterOAuth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connectionOauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
  $connectionOauth->setTimeouts(30, 30);

  $tweets->get('search/tweets.json', [
                                'query' => ['q' => $query]
                        ]);

  print_r($tweets);

  include "layout/footer.php";
