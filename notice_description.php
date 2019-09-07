<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<h2>Description</h2>
<form>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="password" class="form-control" id="exampleInputPassword1" >
  </div>
  <form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Attachement</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>
<button type="button" class="btn btn-outline-primary">Submit</button>
<button type="button" class="btn btn-outline-warning">Edit</button>
<button type="button" class="btn btn-outline-danger">Delete</button>
<button type="button" class="btn btn-outline-secondary">view</button>
</form>

 


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->