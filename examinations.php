<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START MY CODER HERE -->
<?php
$module = "Database";
?>
<head>
<style>
h1{
    text-align: center;
}
form{
    text-align: center;

}
</style>
</head>
<h1>Examinations Portal</h1>
<section class="container">
<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Student Index Number :</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Student index number">
  </div><br>
  <div class="form-group">
    <label for="formGroupExampleInput2">module</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="module marks">
  </div>
</form>
</section>


<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>