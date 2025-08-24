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
// Session is needed for role and warden gender
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Detect WAR user and fetch warden gender
$isWarden = isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'WAR';
$wardenGender = null;
if ($isWarden && !empty($_SESSION['user_name'])) {
  if ($st = mysqli_prepare($con, "SELECT staff_gender FROM staff WHERE staff_id=? LIMIT 1")) {
    mysqli_stmt_bind_param($st, 's', $_SESSION['user_name']);
    mysqli_stmt_execute($st);
    $rs = mysqli_stmt_get_result($st);
    if ($rs) {
      $r = mysqli_fetch_assoc($rs);
      if ($r && isset($r['staff_gender'])) { $wardenGender = $r['staff_gender']; }
    }
    mysqli_stmt_close($st);
  }
}

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
        <!-- Filter Row -->
        <form method="GET" class="form-inline mb-3">
          <div class="form-group mr-2">
            <label for="student_id" class="mr-2">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo isset($_GET['student_id'])? htmlspecialchars($_GET['student_id']) : '';?>" placeholder="e.g. 2019/ICT/001" />
          </div>
          <button type="submit" class="btn btn-outline-primary" name="search" value="1"><i class="fas fa-search"></i> Search</button>
          <?php if (!empty($_GET['student_id'])): ?>
            <a href="/hostel/Hostel.php" class="btn btn-link ml-2">Clear</a>
          <?php endif; ?>
        </form>


<table class="table table-hover mt-2" id="HostelAccomadation">
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
// Build allocation list query with optional filters and warden gender restriction
$q = "SELECT a.id AS alloc_id, a.student_id, a.room_id, a.allocated_at, a.leaving_at, a.status FROM hostel_allocations a";
$where = [];
$params = [];
$types = '';

// If warden, join student to filter by gender
if ($isWarden && $wardenGender) {
  $q .= " INNER JOIN student s ON s.student_id = a.student_id";
  $where[] = "s.student_gender = ?";
  $types .= 's';
  $params[] = $wardenGender;
}

// Student ID filter
if (isset($_GET['search']) && isset($_GET['student_id']) && $_GET['student_id'] !== '') {
  $where[] = "a.student_id = ?";
  $types .= 's';
  $params[] = $_GET['student_id'];
}

if (!empty($where)) {
  $q .= ' WHERE ' . implode(' AND ', $where);
}

$q .= ' ORDER BY a.id DESC';

$result = false;
if ($stmt = mysqli_prepare($con, $q)) {
  if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
  }
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
}

if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.htmlspecialchars($row["alloc_id"]).'</td>';
    echo '<td>'.htmlspecialchars($row["student_id"]).'</td>';
    echo '<td>'.htmlspecialchars($row["room_id"]).'</td>';
    echo '<td>'.htmlspecialchars($row["allocated_at"]).'</td>';
    echo '<td>'.htmlspecialchars($row["leaving_at"] ?: '').'</td>';
    echo '<td>'.htmlspecialchars($row["status"]).'</td>';
    echo '<td class="d-flex">';
    // Info button
    echo '<button type="button" class="btn btn-sm btn-info mr-2 js-see-info" data-student="'.htmlspecialchars($row["student_id"]).'">See info</button>';
    // Delete
    echo '<a data-href="?delete='.htmlspecialchars($row["alloc_id"]).'" data-toggle="modal" data-target="#confirm-delete">';
    echo '<button type="button" name="delete" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></a>';
    // Edit
    echo '<a href="hostel/EditAllocation.php?id='.htmlspecialchars($row["alloc_id"]).'" class="ml-2">';
    echo '<button type="button" class="btn btn-outline-info rounded-pill"><i class="far fa-edit"></i></button></a>';
    echo '</td>';
    echo '</tr>';
  }
} else {
  if ($result === false) {
    echo '<div class="alert alert-danger">Database error: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
  } else {
    echo '<tr><td colspan="7" class="text-center text-muted">No allocations found</td></tr>';
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

<!-- Student Info Modal -->
<div class="modal fade" id="studentInfoModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="studentInfoBody">
          <div class="text-center text-muted">Loading...</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </div>

<script>
// Ensure jQuery is loaded by footer.php before using it
window.addEventListener('load', function(){
  var $ = window.jQuery;
  if (!$) { return; }
  function esc(s){ return (s==null? '' : String(s)); }
  var modal = $('#studentInfoModal');
  $(document).on('click', '.js-see-info', function(){
    var sid = $(this).data('student');
    $('#studentInfoBody').html('<div class="text-center text-muted">Loading...</div>');
    modal.modal('show');
    $.get('../controller/StudentInfo.php', { student_id: sid }, function(resp){
      try {
        if (typeof resp === 'string') resp = JSON.parse(resp);
      } catch(e) { resp = { ok:false, message:'Unexpected response' }; }
      if (resp && resp.ok) {
        var h = ''+
          '<div class="row">'+
            '<div class="col-md-6 mb-3">'+
              '<div class="card h-100">'+
                '<div class="card-header bg-primary text-white">Personal</div>'+
                '<div class="card-body">'+
                  '<div><small class="text-muted d-block">Student ID</small><b>'+esc(resp.data.student_id)+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Full Name</small><b>'+esc(resp.data.student_fullname)+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Gender</small><b>'+esc(resp.data.student_gender)+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Email</small><b>'+esc(resp.data.student_email)+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Phone</small><b>'+esc(resp.data.student_phone)+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Address</small><b>'+esc(resp.data.student_address)+'</b></div>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="col-md-6 mb-3">'+
              '<div class="card h-100">'+
                '<div class="card-header text-white" style="background-color: rgba(208, 3, 3, 0.98);">Emergency Contact</div>'+
                '<div class="card-body">'+
                  '<div><small class="text-muted d-block">Name</small><b>'+esc(resp.data.student_em_name || '—')+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Relation</small><b>'+esc(resp.data.student_em_relation || '—')+'</b></div>'+
                  '<div class="mt-2"><small class="text-muted d-block">Phone</small><b>'+esc(resp.data.student_em_phone || '—')+'</b></div>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>';
        $('#studentInfoBody').html(h);
      } else {
        var m = (resp && resp.message) ? resp.message : 'Failed to load info';
        $('#studentInfoBody').html('<div class="alert alert-warning">'+m+'</div>');
      }
    }).fail(function(){
      $('#studentInfoBody').html('<div class="alert alert-danger">Request failed. Please try again.</div>');
    });
  });
});
</script>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
