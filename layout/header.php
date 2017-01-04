  <?php
  session_start();
  include "config.php";
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Socialogin | Twitter</title>
      <base href="<?php echo $baseUrl;?>" />
      <link rel="stylesheet" href="css/twitter.css"/>

      <!-- Bootstrap -->
      <link href="../static/css/bootstrap.min.css" rel="stylesheet">
      <link href="../static/css/twitterstyle.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <?php
      if (!isset($_SESSION['access_token'])) {
        include 'login.php';
      echo "<div class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
          <div class='navbar-header'>
              <button class='navbar-toggle' type='button' data-toggle='collapse' data-target='#navbar-main'>
                  <span class='icon-bar'></span>
                  <span class='icon-bar'></span>
                  <span class='icon-bar'></span>
              </button>
              <a class='navbar-brand' href='/'>Socialogin</a>
          </div>
          <center>
              <div class='navbar-collapse collapse' id='navbar-main'>
                  <ul class='nav navbar-nav'>
                      <li><a href='/profile'>Nedir?</a></li>
                      <li><a href='/followers'>Ne İşe Yarar?</a></li>
                  </ul>
                  <ul class='nav navbar-nav navbar-right'>
                      <li><a href='$url'><i class='glyphicon glyphicon-circle-arrow-right'></i> Bağlan</a>
                  </ul>
              </div>
          </center>
      </div>
    </div>";
    }
    else {
    echo "<div class='navbar navbar-default navbar-fixed-top'>
    <div class='container'>
        <div class='navbar-header'>
            <button class='navbar-toggle' type='button' data-toggle='collapse' data-target='#navbar-main'>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='/'>Socialogin</a>
        </div>
        <center>
            <div class='navbar-collapse collapse' id='navbar-main'>
                <ul class='nav navbar-nav'>
                    <li><a href='/profile'>Profil</a></li>
                    <li><a href='/followers'>Takipçiler</a></li>
                    <li><a href='/friends'>Takip Ettiklerim</a></li>
                </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href='/logout'><i class='glyphicon glyphicon-circle-arrow-right'></i> Çıkış</a>
                </ul>

            </div>
        </center>
    </div>
  </div>";
  }
    echo "<br><br><br><div class='container theme-showcase' role='main'>
      <!-- Carousel
      ================================================== -->";
