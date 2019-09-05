<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Sign in to MIS";
 include_once("config.php"); 
 include_once("head.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="text-center signin">
    <form class="form-signin" action="index.php">
      <img class="mb-4" src="img/logo-1.png" alt="" height="100">
      <h1 class="mb-3">Sign in to MIS</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <div>
      <a href="#">Forgot password?</a>
        </div>
      
    </form>
  </div>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
