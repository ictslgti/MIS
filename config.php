<?php
session_start();

//database connection
define('DB_HOST','mis.achchuthan.org');
define('DB_USER','misuser');
define('DB_PASS','mIs@SlgT1');
define('DB_NAME','mis');

//cookie
define('COOKIE_RUNTIME', 1209600); // 1209600 seconds = 2 weeks
define('COOKIE_DOMAIN','mis.achchuthan.org'); // the domain where the cookie is valid for, like '.mydomain.com'
define('COOKIE_SECRET_KEY', '1Wp@TMPS{+$78sppMJFe-92s'); // use to salt cookie content and when changed, can invalidate all databases users cookies
  


$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
      //echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
    //echo "Connected successfully";
  }

?>
