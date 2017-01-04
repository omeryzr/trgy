<?php
include "layout/header.php";

require "vendor/TwitterOAuth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
echo "<div class='jumbotron'>
        <h1>SociaLogin Nedir ?</h1>
        <p>SociaLogin uygulaması ile twitter hesabınız veya hesaplarınıza bir çok yönde etki edebilirsiniz. Uygulamaya girerken şifre gereği duymadan özelliklerden faydalanabilirsiniz.
        <br><center><a href = '$url'> <img src='images/signIn.png' style='width: 300px'></center></a></p>
      </div>";

include "layout/footer.php";
