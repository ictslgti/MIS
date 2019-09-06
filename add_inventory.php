<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!-- end default code -->

<!-- start my code -->


<html>
<title> sign up </title>
<body>
<style>
body{
    margin:auto;
    width:100px;
}

div span{
    color:red;
}
</style>
<body>

<h3>Registration Form</h3>
<?php
$nameErr = $usernameErr = $passwordErr = $cpasswordErr = "";
$fullname = $email = $username = $gender = $password = $cpassword = null;


if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $nameErr = "Name is requried";
    } else {
        $fullname = $_POST['name'];
    
}

    if(empty($_POST['user'])){
        $usernameErr  = "username is requried";
    } else {
        $username = $_POST['user'];
    
}



    if(empty($_POST['pass'])){
        $passwordErr = "password is requried";
    }
     else {
        $password = $_POST['pass'];
   
    }



if(empty($_POST['cpass'])){
    $cpasswordErr = "cpassword is requried";
} else {
    $cpassword = $_POST['cpass'];

}

if(!empty($_POST['email'])){

    $email= $_POST['email'];

}

if(empty($_POST['gender'])){
    $gender = "gender is requried";
} else {
    $gender = $_POST['gender'];

}


}


?>


        <form method ="POST" action="#">
<div>
name
<input type="text" name="name">
<span>*<?php echo $nameErr;?></span>
</div>

<div>
gender:
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="male"> male
</div>

<div>
username
<input type="text" name="user">
<span>*<?php echo $usernameErr;?></span>
</div>

<div>
password
<input type="password" name="pass">
<span>*<?php echo $passwordErr;?></span>
</div>

<div>
confirmpassword
<input type="password" name="cpass">
<span>*<?php echo $cpasswordErr;?></span>
</div>


<div>
email
<input type="text" name="email">

</div>

</div>




<div>
<input id="button" type="submit"
name="submit" value="Sign Up">
</div>

</form>


<?php
include_once("config.php");
if(!empty($username)&& !empty($password) && !empty($fullname))
{
if($password ==$cpassword)

$sql="INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$username', '$password', '$email');";
if(mysqli_query($con,$sql)){
    echo "new record created successfully";

}

else{
    echo "Error: " .$sql .
    "<br>" . mysqli_error($con);
}

}
else{
    echo "check your password and confirm password";
}





?>
</body>
</html>    









<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>