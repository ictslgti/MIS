<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php
$title = "Change Password | SLGTI";
include_once("../config.php");
$msg = $msgs = null;

// Require login
if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
    header('Location: ../signin');
    exit;
}
$user_name = $_SESSION['user_name'];

if (isset($_POST['ChangePassword'])) {
    $current = isset($_POST['currentpassword']) ? htmlspecialchars($_POST['currentpassword']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $repeatpassword = isset($_POST['repeatpassword']) ? htmlspecialchars($_POST['repeatpassword']) : '';

    if ($password !== $repeatpassword) {
        $msg = 'Confirm password does not match';
    } elseif (strlen($password) < 8) {
        $msg = 'Password too short (min 8 characters)';
    } else {
        // Verify current password
        $sql = "SELECT user_password_hash FROM user WHERE user_name = '$user_name' LIMIT 1";
        if ($res = mysqli_query($con, $sql)) {
            if ($row = mysqli_fetch_assoc($res)) {
                $current_hash = hash('sha256', $current);
                if (hash_equals($row['user_password_hash'], $current_hash)) {
                    $new_hash = hash('sha256', $password);
                    $sql_u = "UPDATE user SET user_password_hash = '$new_hash' WHERE user_name = '$user_name'";
                    if (mysqli_query($con, $sql_u)) {
                        // Redirect after success: students -> profile, others -> index
                        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'STU') {
                            header('Location: ../student/Student_profile.php');
                        } else {
                            header('Location: ../index.php');
                        }
                        exit;
                    } else {
                        $msg = 'Database error while updating password';
                    }
                } else {
                    $msg = 'Current password is incorrect';
                }
            } else {
                $msg = 'User not found';
            }
        } else {
            $msg = 'Database error';
        }
    }
}
?>
<!--END DON'T CHANGE THE ORDER -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/signin.css">
    <link href="../css/all.min.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6 d-none d-md-flex bg-image"></div>
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4 text-center">MIS@SLGTI</h3>
                            <p class="text-muted text-center mb-4 blockquote-footer">Change Password</p>
                            <form method="post">
                                <?php
                                if (!empty($msg)) echo '<div class="alert alert-danger rounded-pill border-0 shadow-sm px-4">' . $msg . '</div>';
                                if (!empty($msgs)) echo '<div class="alert alert-success rounded-pill border-0 shadow-sm px-4">' . $msgs . '</div>';
                                ?>
                                <div class="form-group mb-3">
                                    <input id="inputcurrent" type="password" name="currentpassword" placeholder="Current password" required
                                           class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputpassword" type="password" name="password" placeholder="New password (min 8 chars)" required
                                           class="form-control rounded-pill border-0 shadow-sm px-4" onkeyup="checkPass(); return false;">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputrepeatpassword" type="password" name="repeatpassword" placeholder="Re-enter new password" required
                                           class="form-control rounded-pill border-0 shadow-sm px-4" onkeyup="checkPass(); return false;">
                                </div>
                                <div class="d-flex mt-2">
                                    <p class="text-center" id="error-nwl"></p>
                                </div>
                                <button type="submit" name="ChangePassword" id="ChangePassword"
                                        class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" disabled>Change Password</button>
                                <div class="form-group mb-3 text-center mt-2">
                                    <a href="../home/home.php" class="font-italic text-muted">Back to Home</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        if(pass1.value.length >= 8){
            pass1.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML ="";
        } else {
            pass1.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " You have to enter at least 8 digit!";
            document.getElementById("ChangePassword").disabled = true;
            return;
        }
        if(pass1.value === pass2.value){
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            document.getElementById("ChangePassword").disabled = false;
            message.innerHTML ="";
        } else {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            document.getElementById("ChangePassword").disabled = true;
            message.innerHTML = " These passwords don't match";
        }
    }
</script>
</body>
</html>
