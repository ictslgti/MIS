<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "hostel | SLGTI";
include_once("../config.php");
include_once("../head.php");
include_once("../menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<?php 
// Delete an allocation by its ID (from normalized schema)
if (isset($_GET['delete'])) {
  $alloc_id = (int)$_GET['delete'];
  if ($alloc_id > 0) {
    if ($stDel = mysqli_prepare($con, "DELETE FROM hostel_allocations WHERE id = ?")) {
      mysqli_stmt_bind_param($stDel, 'i', $alloc_id);
      $ok = mysqli_stmt_execute($stDel);
      mysqli_stmt_close($stDel);
      if ($ok) {
        echo '<div class="alert alert-danger">
          <strong>Deleted!</strong> Allocation removed.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      } else {
        echo '<div class="alert alert-warning">Error deleting allocation: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Failed to prepare delete: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
    }
  }
}
?>










<div style="margin-top:30px ">
  <div class="card ">
   <div class="card-header bg-info">
      <div class="row">
        <div class="col-md-9" >
       
                <label style="font-family: 'Luckiest Guy', cursive; font-size: 20px; "> <i class="fas fa-user-graduate"></i> &nbsp; Student Accomadation</label>
                <!-- <footer class="blockquote-footer" style=" padding-left: 650px">Hostel Allocation <cite title="Source Title"></cite></footer> -->
            
        </div>
        
      </div>
    </div>

    <div class="card-body">
    <div class="table-responsive">
        <!-- <span id="message_operation"></span> -->

       

<table class="table table-hover   mt-4 " id="Hostel accomadation">
<thead>
<tr>
      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Allocation ID</th>
      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Student ID</th>
      <th scope="col"><i class="fas fa-list-ol"></i>&nbsp;Room ID</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Allocated At</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Leaving At</th>
      <th scope="col"><i class="fas fa-info-circle"></i>&nbsp;Status</th>
      <th scope="col"><i class="far fa-caret-square-right"></i>&nbsp;Action</th>
    </tr>

   


    

</thead>

<tbody>
<?php 
// Use only hostel_allocations columns
$sql = "SELECT id AS alloc_id, student_id, room_id, allocated_at, leaving_at, status
        FROM hostel_allocations";

$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
echo '<tr>
<td>'.$row["alloc_id"].'</td>
    <td>'.$row["student_id"].'</td>
    <td>'.$row["room_id"].'</td>
    <td>'.$row["allocated_at"].'</td>
    <td>'.($row["leaving_at"] ?: '').'</td>
    <td>'.$row["status"].'</td>
    <td>
    <a data-href="?delete='.$row["alloc_id"].'" data-toggle="modal" data-target="#confirm-delete">
    <button type="button" name="delete" class="btn btn-danger btn-circle">
    <i class="fas fa-trash"></i>
    </button></a>

    <a href="hostel/EditAllocation.php?id='.$row["alloc_id"].'" >
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="far fa-edit"></i>
    </button></a></td>
    </form>
     </td>
    </tr>';

  }
} else {
  if ($result === false) {
    echo '<div class="alert alert-danger">Database error: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
  } else {
    echo "0 result";
  }
}

 ?>

</tbody>
</table>
</div>
   </div>
  </div>
</div>
</div>








<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
