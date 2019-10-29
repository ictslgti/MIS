<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Sign in to continue to MIS @ SLGTI";
include_once("config.php");
?>
<!--END DON'T CHANGE THE ORDER-->
<?php

//loginWithCookieData
if (isset($_COOKIE['rememberme'])) {
  list ($user_name, $token, $hash) = explode(':', $_COOKIE['rememberme']);
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
            $_SESSION['department_code'] = $row_u['department_id'];
          }
        }
        if($row['user_table']=='student'){
          $sql_s = "SELECT `course`.`department_id` AS `department_id`  FROM `student_enroll` LEFT JOIN `course` 
          ON `student_enroll`.`course_id` = `course`.`course_id` 
          WHERE `student_enroll`.`student_id` = '".$_SESSION['user_name']."'";
          $result_s = mysqli_query($con,$sql_s);
          if(mysqli_num_rows($result_s)==1){
            $row_s = mysqli_fetch_assoc($result_s);
             $_SESSION['department_code'] = $row_s['department_id'];
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
  $password_hash = hash('sha256', $password);
  $sql = "SELECT * FROM `user` WHERE `user_name`='$username' AND `user_password_hash`='$password_hash' AND `user_active`=1";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1){
    $_SESSION['user_name'] = $username; 
    
    if(!empty($_POST['rememberme']) ){
    //set a cookie
     $random_token_string = hash('sha256', mt_rand());
     $sql = "UPDATE `user` SET `user_remember_me_token` = '$random_token_string'  WHERE `user_name` = '$username'";
    mysqli_query($con,$sql) or die();
     $cookie_string_first_part = $_SESSION['user_name'] . ':' . $random_token_string;
      $cookie_string_hash = hash('sha256', $cookie_string_first_part . COOKIE_SECRET_KEY);
      $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
    // // set cookie
    setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
    //end cookie
    }
    $row = mysqli_fetch_assoc($result);
     //set session data
     $_SESSION['user_name'] =  $row['user_name'];
     $_SESSION['user_table'] =  $row['user_table'];
     $_SESSION['user_type'] =  $row['staff_position_type_id'];
    //end session data

    //set department session data
    if($row['user_table']=='staff'){
      $sql_u = "SELECT * FROM `staff` WHERE `staff_id` = '$username'";
      $result_u = mysqli_query($con,$sql_u);
      if(mysqli_num_rows($result_u)==1){
        $row_u = mysqli_fetch_assoc($result_u);
       $_SESSION['department_code'] = $row_u['department_id'];
      }
    }
    if($row['user_table']=='student'){
     $sql_s = "SELECT `course`.`department_id` AS `department_id`  FROM `student_enroll` LEFT JOIN `course` 
      ON `student_enroll`.`course_id` = `course`.`course_id` 
      WHERE `student_enroll`.`student_id` = '".$_SESSION['user_name']."'";
      $result_s = mysqli_query($con,$sql_s);
      if(mysqli_num_rows($result_s)==1){
        $row_s = mysqli_fetch_assoc($result_s);
        $_SESSION['department_code'] = $row_s['department_id'];
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
</head>

<body>

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4 text-center">MIS@SLGTI</h3>
                                <p class="text-muted text-center mb-4 blockquote-footer">Management Information System
                                </p>
                                <form  method="post">
                                    <?php
                                    if (!empty($msg))
                                    echo '<div class="alert alert-danger rounded-pill border-0 shadow-sm px-4" >' . $msg . '</div>';
                                    ?>
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="text" name="username" placeholder="Username" required=""
                                            autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="inputPassword" type="password" name="password" placeholder="Password" required=""
                                            class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" name="rememberme" value="yes" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                                    </div>
                                    <button type="submit" name="SignIn"
                                        class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign
                                        in</button>

                                    <div class="form-group mb-3 text-center">
                                    <a href="passwordrecovery" class="font-italic text-muted pr-1">Forgot password?</a>
                                    Don't have an account?
                                    <a href="signup"class="font-italic text-muted text-right">Sign Up</a>
                                    </div>
                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p>All Rights Reserved. Designed and Developed by Department of Information and
                                            Communication Technology, <a href="http://slgti.com"
                                                class="font-italic text-muted">
                                                Sri Lanka-German Training Institute.</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
</body>

</html>