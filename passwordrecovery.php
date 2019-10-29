<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Find your MIS @ SLGTI Account ";
include_once("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;         
require './library/PHPMailer/autoload.php';
$msg =$msgs = null;
if (isset($_POST['ResetPassword']) && !empty($_POST['username'])) {
  $user_name = htmlspecialchars($_POST['username']);

  $temporary_timestamp = time();
  // generate random hash for email password reset verification (40 char string)
  $user_password_reset_hash = sha1(uniqid(mt_rand(), true));

  // database query, getting all the info of the selected user
    $sql = "SELECT user_email,user_active FROM user WHERE user_name = '$user_name'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $user_email = $row['user_email'];
    $user_active = $row['user_active'];
    if($user_active==1){
        $sql = "UPDATE user SET user_password_reset_hash = '$user_password_reset_hash',
        user_password_reset_timestamp = '$temporary_timestamp'
        WHERE user_name = '$user_name' ";

        // check if exactly one row was successfully changed:
        if(mysqli_query($con,$sql)){
            // send a mail to the user, containing a link with that token hash string
            if(EMAIL_USE_SMTP){
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->setFrom(EMAIL_PASSWORDRESET_FROM, EMAIL_PASSWORDRESET_FROM_NAME);
            $mail->addReplyTo(EMAIL_PASSWORDRESET_FROM, EMAIL_PASSWORDRESET_FROM_NAME);
            $mail->addAddress($user_email);
            $mail->Subject = EMAIL_PASSWORDRESET_SUBJECT;
            $link    = EMAIL_PASSWORDRESET_URL.'?un='.urlencode($user_name).'&vc='.urlencode($user_password_reset_hash);
            $html_message = "
                Dear  $user_name,
                <br />
                We received a request for password change for <b> $user_name </b> at ". EMAIL_PASSWORDRESET_FROM_NAME.".
                <br />
                Go to this page $link  to set your new password.  <br />
                The link will be active for one hour.
                <br />
                <br />
                Best Regards,
                <br />
                The ICT Support Team
                <br />   
            ";
            $mail->msgHTML($html_message, __DIR__);
            if (!$mail->send()) {
                $msg = 'Password mail not sent';
            } else {
                $msgs = 'Password mail sent';
            }
        }
        
        }else{
            $msg = 'Database error';
        }
    }else{
        $msg = 'User not active';
    }
  }else{
    $msg = 'User not exist';
  }
}
?>

<?php
if (isset($_POST['ChangePassword']) && !empty($_POST['password'])&& !empty($_POST['repeatpassword'])) {
    $password = htmlspecialchars($_POST['password']);
    $repeatpassword = htmlspecialchars($_POST['repeatpassword']);
    $user_name = htmlspecialchars($_GET['un']);
    $user_password_reset_hash = htmlspecialchars($_GET['vc']);
    if($password==$repeatpassword){
        if(strlen($password)>=8){
            $password_hash = hash('sha256', $password);
            $sql_r = "UPDATE user  SET user_password_hash = '$password_hash',
            user_password_reset_hash = NULL, user_password_reset_timestamp = NULL
            WHERE user_name = '$user_name' AND user_password_reset_hash = '$user_password_reset_hash'";
             if(mysqli_query($con,$sql_r)){
                $msgs = 'Password changed';
             }else{
                $msg = 'Password changed failed';
             }
             
        }else{
            $msg = 'Password too short';
        }
    }else{
        $msg = 'Bad confirm password';
    }
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
                                    
                                    if (!empty($msgs))
                                    echo '<div class="alert alert-success rounded-pill border-0 shadow-sm px-4" >' . $msgs . '</div>';
                                    
                                    ?>
                                    <?php 
                                    if(!isset($_GET['un']) && !isset($_GET['vc'])){
                                    ?>

                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="text" name="username" placeholder="Username" required=""
                                            autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    
                                    <button type="submit" name="ResetPassword"
                                        class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Reset Password</button>

                                    <?php
                                    }
                                    ?>
                                    <?php 
                                    if(isset($_GET['un']) && isset($_GET['vc'])){
                                    ?>
                                    <!-- reset password? -->
                                    <div class="form-group mb-3">
                                        <input id="inputpassword" type="password" name="password" placeholder="New password" required=""
                                            autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" onkeyup="checkPass(); return false;">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input id="inputrepeatpassword" type="password" name="repeatpassword" placeholder="Re-enter new password" required=""
                                            autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" onkeyup="checkPass(); return false;" >
                                    </div> 

                                    <div class="d-flex mt-4">
                                    <p class="text-center" id="error-nwl"></p>
                                    </div>
                                    <button type="submit" name="ChangePassword" id="ChangePassword"
                                        class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Change Password</button>
                                    
                                    <!-- reset password? -->

                                    <?php
                                    }
                                    ?>
                                    <div class="form-group mb-3 text-center">
                                    <a href="passwordrecovery" class="font-italic text-muted pr-1">Forgot password?</a>
                                   
                                    <a href="signin"class="font-italic text-muted text-right">Sign in instead</a>
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
<script>
    document.getElementById("ChangePassword").disabled = true;
    function checkPass(){
    var pass1 = document.getElementById('inputpassword');
    var pass2 = document.getElementById('inputrepeatpassword');
    var message = document.getElementById('error-nwl');
    var goodColor = "rgb(147, 255, 171)";
    var badColor = "rgb(255, 201, 206)";
 	
    if(pass1.value.length >= 8)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML ="";
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " You have to enter at least 8 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        document.getElementById("ChangePassword").disabled = false;
        message.innerHTML ="";
    }
	else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }
}  
</script>
</body>

</html>