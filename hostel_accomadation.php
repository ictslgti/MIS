<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">student accomadation</div>
        <!-- <div class="col-md-3" align="right">
          <button type="button" id="report_button" class="btn btn-danger btn-sm">Report</button>
          <button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
        </div> -->
      </div>
    </div>

    <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>

<table class="table table-bordered  table-striped" id="Hostel accomadation">
<thead>
<tr>
      <th scope="col">Student_id</th>
      <th scope="col">full name</th>
      <th scope="col">gender</th>
      <th scope="col">room no</th>
      <th scope="col">Block no</th>
      <th scope="col">Date of admission</th>
      
      <th scope="col">Leaving date</th>
      <th scope="col">address</th>
      <th scope="col">district</th>
    </tr>

</thead>

<tbody>


</tbody>
</table>
</div>
   </div>
  </div>
</div>








<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->