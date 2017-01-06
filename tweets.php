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
      $q = "muzyka";
      $users = $connectionOauth->get('users/search', array('q' => $q));
      $a = json_decode($users, true);
      print_r($a);




  }

  include "layout/footer.php";
