<?php
// BLOCK#1 START DON'T CHANGE THE ORDER
$title = "Staff Position Types | SLGTI";
include_once("../config.php");

// Admin-only access
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'ADM') {
  include_once("../head.php");
  include_once("../menu.php");
  http_response_code(403);
  echo '<div class="alert alert-danger m-3">Access denied. Admins only.</div>';
  include_once("../footer.php");
  exit;
}

include_once("../head.php");
include_once("../menu.php");
// END DON'T CHANGE THE ORDER

// Helpers
function sp_safe($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$errors = [];
$success = null;

// Handle Create/Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = isset($_POST['staff_position_type_name']) ? trim($_POST['staff_position_type_name']) : '';
  $code = isset($_POST['staff_position_type_id']) ? trim($_POST['staff_position_type_id']) : '';
  $order = isset($_POST['staff_position']) ? trim($_POST['staff_position']) : '';

  if ($name === '') { $errors[] = 'Position type name is required'; }
  if (isset($_POST['action']) && $_POST['action'] === 'create') {
    if ($code === '') { $errors[] = 'Position type code is required'; }
    elseif (!preg_match('/^[A-Za-z0-9]{1,11}$/', $code)) { $errors[] = 'Code must be alphanumeric (max 11 chars)'; }
  }
  if ($order === '' || !ctype_digit($order)) { $errors[] = 'Order must be a number'; }

  if (empty($errors)) {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
      $sql = "INSERT INTO staff_position_type (staff_position_type_id, staff_position_type_name, staff_position) VALUES (?,?,?)";
      $stmt = mysqli_prepare($con, $sql);
      $ord = (int)$order;
      mysqli_stmt_bind_param($stmt, 'ssi', $code, $name, $ord);
      if (mysqli_stmt_execute($stmt)) {
        $success = 'Created successfully';
      } else {
        $errors[] = 'Insert failed: ' . mysqli_error($con);
      }
      mysqli_stmt_close($stmt);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
      // code provided via hidden field; do not allow changing PK
      if ($code === '' || !preg_match('/^[A-Za-z0-9]{1,11}$/', $code)) {
        $errors[] = 'Invalid code';
      } else {
        $sql = "UPDATE staff_position_type SET staff_position_type_name=?, staff_position=? WHERE staff_position_type_id=?";
        $stmt = mysqli_prepare($con, $sql);
        $ord = (int)$order;
        mysqli_stmt_bind_param($stmt, 'sis', $name, $ord, $code);
        if (mysqli_stmt_execute($stmt)) {
          $success = 'Updated successfully';
        } else {
          $errors[] = 'Update failed: ' . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
      }
    }
  }
}

// Handle Delete
if (isset($_GET['delete']) && $_GET['delete'] !== '') {
  $delId = $_GET['delete'];
  $sql = "DELETE FROM staff_position_type WHERE staff_position_type_id=?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 's', $delId);
  if (mysqli_stmt_execute($stmt)) {
    $success = 'Deleted successfully';
  } else {
    $errors[] = 'Delete failed: ' . mysqli_error($con);
  }
  mysqli_stmt_close($stmt);
}

// Record to edit
$edit = null;
if (isset($_GET['edit']) && $_GET['edit'] !== '') {
  $eid = $_GET['edit'];
  $stmt = mysqli_prepare($con, "SELECT * FROM staff_position_type WHERE staff_position_type_id=?");
  mysqli_stmt_bind_param($stmt, 's', $eid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  if ($res && mysqli_num_rows($res) === 1) { $edit = mysqli_fetch_assoc($res); }
  mysqli_stmt_close($stmt);
}
?>

<!-- BLOCK#2 START YOUR CODE HERE -->
<div class="container mt-3">
  <div class="row">
    <div class="col-lg-5">
      <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span><i class="fas fa-briefcase"></i> <?php echo $edit ? 'Edit' : 'Add'; ?> Staff Position Type</span>
          <?php if ($edit) { echo '<a class="btn btn-sm btn-secondary" href="'.(defined('APP_BASE')?APP_BASE:'').'/staff/StaffPositionType.php">New</a>'; } ?>
        </div>
        <div class="card-body">
          <?php if (!empty($errors)) { echo '<div class="alert alert-danger py-2">'.sp_safe(implode(' | ', $errors)).'</div>'; }
                if ($success) { echo '<div class="alert alert-success py-2">'.sp_safe($success).'</div>'; } ?>
          <form method="post">
            <input type="hidden" name="action" value="<?php echo $edit ? 'update' : 'create'; ?>">
            <div class="form-group">
              <label for="staff_position_type_id">Position Type Code</label>
              <?php if ($edit) { ?>
                <input type="text" class="form-control" id="staff_position_type_id" value="<?php echo sp_safe($edit['staff_position_type_id']); ?>" disabled>
                <input type="hidden" name="staff_position_type_id" value="<?php echo sp_safe($edit['staff_position_type_id']); ?>">
              <?php } else { ?>
                <input type="text" class="form-control" name="staff_position_type_id" id="staff_position_type_id" maxlength="11" placeholder="e.g., ADM, HOD, IN2" required>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="staff_position_type_name">Position Type Name</label>
              <input type="text" class="form-control" name="staff_position_type_name" id="staff_position_type_name" value="<?php echo sp_safe($edit ? $edit['staff_position_type_name'] : ''); ?>" required>
            </div>
            <div class="form-group">
              <label for="staff_position">Order</label>
              <input type="number" class="form-control" name="staff_position" id="staff_position" min="0" value="<?php echo sp_safe($edit ? $edit['staff_position'] : '0'); ?>" required>
            </div>
            <button type="submit" class="btn btn-<?php echo $edit ? 'warning' : 'success'; ?>">
              <i class="fas fa-<?php echo $edit ? 'save' : 'plus'; ?>"></i> <?php echo $edit ? 'Update' : 'Create'; ?>
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="card mb-3">
        <div class="card-header"><i class="fas fa-list"></i> Staff Position Types</div>
        <div class="card-body p-0">
          <div class="table-responsive" style="max-height: 420px; overflow-y: auto;">
            <table class="table table-striped table-hover mb-0">
              <thead class="thead-dark" style="position: sticky; top: 0; z-index: 1;">
                <tr>
                  <th style="width:120px;">Code</th>
                  <th>Name</th>
                  <th style="width:90px;">Order</th>
                  <th style="width:160px;">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $list = mysqli_query($con, "SELECT * FROM staff_position_type ORDER BY staff_position ASC, staff_position_type_name ASC");
                if ($list && mysqli_num_rows($list) > 0) {
                  while ($r = mysqli_fetch_assoc($list)) {
                    $id = $r['staff_position_type_id'];
                    echo '<tr>';
                    echo '<td>'.sp_safe($id).'</td>';
                    echo '<td>'.sp_safe($r['staff_position_type_name']).'</td>';
                    echo '<td>'.sp_safe($r['staff_position']).'</td>';
                    echo '<td>';
                    echo '<a class="btn btn-sm btn-warning" href="'.(defined('APP_BASE')?APP_BASE:'').'/staff/StaffPositionType.php?edit='.urlencode($id).'"><i class="far fa-edit"></i></a> ';
                    echo '<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete" data-href="'.(defined('APP_BASE')?APP_BASE:'').'/staff/StaffPositionType.php?delete='.urlencode($id).'"><i class="fas fa-trash"></i></button>';
                    echo '</td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="4" class="text-center text-muted">No position types found</td></tr>';
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Confirm Delete Modal (reuse global if exists) -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this position type?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<script>
  // Wire modal dynamic href
  $('#confirm-delete').on('show.bs.modal', function(e){
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php include_once("../footer.php"); ?>
<!-- END DON'T CHANGE THE ORDER -->
