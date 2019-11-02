<?php
session_start();
date_default_timezone_set('Asia/Colombo');
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



define("EMAIL_USE_SMTP", true);
define("EMAIL_SMTP_HOST", 'smtp.gmail.com');
define("EMAIL_SMTP_AUTH", true); // leave this true until your SMTP can be used without login
define("EMAIL_SMTP_USERNAME", 'slgtimis@gmail.com');
define("EMAIL_SMTP_PASSWORD", 'slgtimis123$');
define("EMAIL_SMTP_PORT", 587);
define("EMAIL_SMTP_ENCRYPTION", 'tls');
/**
 * Configuration file for: password reset email data
 * This is the place where your constants are saved
 * absolute URL to register.php, necessary for email password reset links 
* */

define("EMAIL_PASSWORDRESET_URL", "https://".COOKIE_DOMAIN."/passwordrecovery");
define("EMAIL_PASSWORDRESET_FROM", "noreply@achchuthan.org");
define("EMAIL_PASSWORDRESET_FROM_NAME", "MIS@SLGTI");
define("EMAIL_PASSWORDRESET_SUBJECT", "[MIS@SLGTI] Password Reset");
define("EMAIL_PASSWORDRESET_CONTENT", "Please click on this link to reset your password: ");
/**
 * Configuration file for: verification email data
 * This is the place where your constants are saved
 * absolute URL to register.php, necessary for email verification links 
 * */
define("EMAIL_VERIFICATION_URL", "https://".COOKIE_DOMAIN."/signup");
define("EMAIL_VERIFICATION_FROM", "noreply@achchuthan.org");
define("EMAIL_VERIFICATION_FROM_NAME", "MIS@SLGTI");
define("EMAIL_VERIFICATION_SUBJECT", "[MIS@SLGT] Account Activation I");
define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");



?>
