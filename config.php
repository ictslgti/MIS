<?php
session_start();


define('DB_HOST','localhost');
define('DB_USER','misuser');
define('DB_PASS','mIs@SlgT1');
define('DB_NAME','mis');
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . 		
      mysqli_connect_error();
  }else{
    echo "Connected successfully";
  }

?>
