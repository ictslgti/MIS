<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Sign in to MIS";
include_once("config.php");
?>
<!--END DON'T CHANGE THE ORDER-->
<?php

//loginWithCookieData
if (isset($_COOKIE['rememberme'])) {
  list ($user_name, $token, $hash) = explode(':', $_COOKIE['rememberme']);
  // echo $user_name;
  // echo '<br>';
  // echo $token;
  // echo '<br>';
  // echo $hash;

  if ($hash == hash('sha256', $user_name . ':' . $token . COOKIE_SECRET_KEY) && !empty($token)) {

  $sql = "SELECT user_id, user_table, staff_position_type_id, user_name, user_email FROM user WHERE user_name = '$user_name'
  AND user_remember_me_token = '$token' AND user_remember_me_token IS NOT NULL";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
//set session data
    $username = $row['user_name'];
    $_SESSION['user_name'] =  $row['user_name'];
    $_SESSION['user_table'] =  $row['user_table'];
    $_SESSION['user_type'] =  $row['staff_position_type_id'];
//end session data

//update cookie
     $random_token_string = hash('sha256', mt_rand());
     $sql = "UPDATE user SET user_remember_me_token = '$random_token_string' WHERE user_name = '$user_name'";
      // generate cookie string that consists of userid, randomstring and combined hash of both
    $result = mysqli_query($con,$sql) or die();
    $cookie_string_first_part = $_SESSION['user_name'] . ':' . $random_token_string;
    $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
    $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
    // set cookie
    setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
//end update cookie

//set department session data
        if($row['user_table']=='staff'){
          $sql_u = "SELECT * FROM `staff` WHERE `staff_id` = '$username'";
          $result_u = mysqli_query($con,$sql_u);
          if(mysqli_num_rows($result_u)==1){
            $row_u = mysqli_fetch_assoc($result_u);
          echo  $_SESSION['department_code'] = $row_u['department_id'];
          }
        }
        if($row['user_table']=='student'){
        echo  $sql_s = "SELECT `course`.`department_id` AS `department_id`  FROM `student_enroll` LEFT JOIN `course` 
          ON `student_enroll`.`course_id` = `course`.`course_id` 
          WHERE `student_enroll`.`student_id` = '".$_SESSION['user_name']."'";
          $result_s = mysqli_query($con,$sql_s);
          if(mysqli_num_rows($result_s)==1){
            $row_s = mysqli_fetch_assoc($result_s);
            echo $_SESSION['department_code'] = $row_s['department_id'];
          }
        }
//end department session
      header("Location: index.php");

    }
  }
}


//-----------------------------------------------------------------------------------------------

// SIGNIN WITH SESSION AND COOKIE
$msg = null;
if (isset($_POST['SignIn']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $sql = "SELECT * FROM `user` WHERE `user_name`='$username' AND `user_password_hash`='$password'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1){
    $_SESSION['user_name'] = $username; 
    
    //set a cookie
    echo $random_token_string = hash('sha256', mt_rand());
    echo '<br>';
    echo $sql = "UPDATE `user` SET `user_remember_me_token` = '$random_token_string'  WHERE `user_name` = '$username'";
    echo '<br>';
    mysqli_query($con,$sql) or die();
    echo $cookie_string_first_part = $_SESSION['user_name'] . ':' . $random_token_string;
    echo '<br>';
    echo  $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
    echo '<br>';
    echo  $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
    echo '<br>';
    // // set cookie
    setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
    //end cookie

    $row = mysqli_fetch_assoc($result);
     //set session data
     echo $_SESSION['user_name'] =  $row['user_name'];
     echo $_SESSION['user_table'] =  $row['user_table'];
     echo $_SESSION['user_type'] =  $row['staff_position_type_id'];
    //end session data

    //set department session data
    if($row['user_table']=='staff'){
      $sql_u = "SELECT * FROM `staff` WHERE `staff_id` = '$username'";
      $result_u = mysqli_query($con,$sql_u);
      if(mysqli_num_rows($result_u)==1){
        $row_u = mysqli_fetch_assoc($result_u);
       echo  $_SESSION['department_code'] = $row_u['department_id'];
      }
    }
    if($row['user_table']=='student'){
     echo  $sql_s = "SELECT `course`.`department_id` AS `department_id`  FROM `student_enroll` LEFT JOIN `course` 
      ON `student_enroll`.`course_id` = `course`.`course_id` 
      WHERE `student_enroll`.`student_id` = '".$_SESSION['user_name']."'";
      $result_s = mysqli_query($con,$sql_s);
      if(mysqli_num_rows($result_s)==1){
        $row_s = mysqli_fetch_assoc($result_s);
        echo $_SESSION['department_code'] = $row_s['department_id'];
      }
    }
    //end department session
    header("Location: index.php");
  }else {
    $msg = 'Invalid login, please try again';
  }
}
?>

<!-- SignOut -->
<?php
if (isset($_GET['signout'])) {
  setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
  unset($_SESSION["user_name"]);
  unset($_SESSION["user_type"]);
  unset($_SESSION["department_code"]);
  header('Refresh: 0; URL = signin.php');

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!--BLOCK#2 START YOUR CODE HERE -->
        <div class="text-center signin">
            <form class="form-signin" action="#" method="post">
                <img class="mb-4" src="img/logo-1.png" alt="" height="100">
                <?php
        if (!empty($msg))
          echo '<div class="alert alert-danger" >' . $msg . '</div>';
        ?>
                <h1 class="mb-3">Sign in to MIS</h1>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="inputEmail" class="form-control" name="username"
                    placeholder="[achchuthan,2025ICT5IT01]" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="1234"
                    required>
                <button type="submit" name="SignIn" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <div>
                    <a href="#">Forgot password?</a>
                </div>

            </form>
        </div>
    </div>

    <body>

</html>