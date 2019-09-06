<!--BLOCK#1 START DON'T CHANGE THE ORDER-->

<?php 
$title="DEPARTMENT DETAIL | SLGTI";
include_once("config.php");// in this field we can use for database connectivity, email configure
include_once("head.php"); 
include_once("menu.php"); 
//include_once("head.php"); 


?>
 <!-- END DON'T CHANGE THE ORDER -->


<!--BLOCK#2  START YOUR CODE HERE -->

<div class="row">
<div class="col-10"><h3>Department Details</h3></div>
<div class="col-2"><button type="button" class="btn btn-primary">Add Department +</button></div>
</div>

<DIV class="row">
<div class="col">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


</div>
</div>

    <!--BLOCK#1  START DON'T CHANGE THE ORDER -->
    <?php include_once("footer.php") ;?>
    <!-- END DON'T CHANGE THE ORDER -->
