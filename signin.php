<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Sign in to MIS";
include_once("config.php");
?>
<!--END DON'T CHANGE THE ORDER-->
<?php
$msg = null;
if (isset($_POST['SignIn']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $_SESSION['user_name'] = $username;

  if ($username == 'admin') {
    $_SESSION['user_type'] = 'ADM';
    $_SESSION['department_code'] = 'ALL'; // null or values(ICT,AUT,COT...)
    header("Location: index.php");
  } else if ($username == 'student') {
    $_SESSION['user_type'] = 'STU';
    $_SESSION['department_code'] = 'ICT'; // null or values(ICT,AUT,COT...)
    header("Location: index.php");
  } else if ($username == 'lecturer') {
    $_SESSION['user_type'] = 'LEC';
    $_SESSION['department_code'] = 'ICT'; // null or values(ICT,AUT,COT...)
    header("Location: index.php");
  } else if ($username == 'hod') {
    $_SESSION['user_type'] = 'HOD';
    $_SESSION['department_code'] = 'ICT'; // null or values(ICT,AUT,COT...)
    header("Location: index.php");
  } else {
    $msg = 'Invalid login, please try again';
  }
}
?>

<!-- SignOut -->
<?php
if (isset($_GET['signout'])) {
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
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="[admin,student,lecturer,hod]" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="1234" required>
        <button type="submit" name="SignIn" class="btn btn-lg btn-primary btn-block">Sign in</button>
        <div>
          <a href="#">Forgot password?</a>
        </div>

      </form>
    </div>
  </div>
  <body>
</html>