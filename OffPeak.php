<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<br><br>


<div class="intro p-5 mb-5 border border-dark rounded">
<div class="shadow p-3 mb-5 bg-white rounded"> 
  <h1 class="display-4 text-center  "><i class="fas fa-inbox"></i> Off-peak Requests</h1>
  </div>
  <div class="col-md-1 col-sm-12   float-right ">
<input type="button" class="btn btn-info " onclick="window.location.href='off_peak_info.php'" id="btn" name="off-peak info" value="off-peak info">
</div>
<br><br>
    <div class="table-responsive-sm">
    <table class="table table-responsive-sm w-100">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name of applicant</th>
      <th scope="col">Registration No</th>
      <th scope="col">Department</th>
      <th scope="col">Contact No</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Reason for exit</th>
      <th scope="col">warden comment</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>????</td>
      <td>????</td>
      <td>????</td>
      <td>?????</td>
      <td>?????</td>
      <td>????</td>
      <td>??????</td>
      <td><input type="text" id="cmt"> </td>
      <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i> Approve</button>   <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i>  Reject</button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>????</td>
      <td>????</td>
      <td>????</td>
      <td>?????</td>
      <td>?????</td>
      <td>????</td>
      <td>??????</td>
      <td><input type="text" id="cmt"> </td>
      <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i> Approve</button>   <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i>  Reject</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>????</td>
      <td>????</td>
      <td>????</td>
      <td>?????</td>
      <td>?????</td>
      <td>????</td>
      <td>??????</td>
      <td><input type="text" id="cmt"> </td>
      <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i> Approve</button>   <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i>  Reject</button></td>
    </tr>
    
    <tr>
      <th scope="row">3</th>
      <td>????</td>
      <td>????</td>
      <td>????</td>
      <td>?????</td>
      <td>?????</td>
      <td>????</td>
      <td>??????</td>
      <td><input type="text" id="cmt"> </td>
      <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i> Approve</button>   <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i>  Reject</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>????</td>
      <td>????</td>
      <td>????</td>
      <td>?????</td>
      <td>?????</td>
      <td>????</td>
      <td>??????</td>
      <td><input type="text" id="cmt"> </td>
      <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i> Approve</button>   <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i>  Reject</button></td>
    </tr>
  </tbody>
</table>
</div>

 
  </tbody>
</table>

</div>
<a href="index.php"><<< Back to home </a>
   

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
