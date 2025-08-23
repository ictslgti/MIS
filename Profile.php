<?php
include_once("config.php");

$username = $_SESSION['user_name'];
$__update_ok = false;

// Handle staff profile update before any output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_profile') {
    $p_name   = isset($_POST['staff_name']) ? trim($_POST['staff_name']) : null;
    $p_addr   = isset($_POST['staff_address']) ? trim($_POST['staff_address']) : null;
    $p_dob    = isset($_POST['staff_dob']) ? trim($_POST['staff_dob']) : null;
    $p_nic    = isset($_POST['staff_nic']) ? trim($_POST['staff_nic']) : null;
    $p_email  = isset($_POST['staff_email']) ? trim($_POST['staff_email']) : null;
    $p_pno    = isset($_POST['staff_pno']) ? trim($_POST['staff_pno']) : null;
    $p_gender = isset($_POST['staff_gender']) ? trim($_POST['staff_gender']) : null;

    // Normalize phone to digits only
    if ($p_pno !== null) { $p_pno = preg_replace('/[^0-9]/', '', $p_pno); }

    // Normalize DOB to YYYY-MM-DD if valid
    if (!empty($p_dob)) { $ts = strtotime($p_dob); if ($ts) { $p_dob = date('Y-m-d', $ts); } }

    $sqlUpd = "UPDATE staff SET staff_name=?, staff_address=?, staff_dob=?, staff_nic=?, staff_email=?, staff_pno=?, staff_gender=? WHERE staff_id=?";
    if ($stmt = mysqli_prepare($con, $sqlUpd)) {
        mysqli_stmt_bind_param($stmt, 'ssssssss', $p_name, $p_addr, $p_dob, $p_nic, $p_email, $p_pno, $p_gender, $username);
        if (mysqli_stmt_execute($stmt)) { $__update_ok = true; }
        mysqli_stmt_close($stmt);
    }

    if ($__update_ok) {
        if (!headers_sent()) {
            header('Location: /Profile.php?updated=1');
        } else {
            echo '<script>window.location.href = "/Profile.php?updated=1";</script>';
        }
        exit;
    }
}
$StaffID=$Department_name=$StaffName=$Address=$DOB=$NIC=$Email=$PNO=$DOJ=$Gender=$EPF=$Position=$Type=null;
$sql="SELECT 
    `staff`.`staff_id`,
    `staff`.`staff_name`,
    `staff`.`staff_address`,
    `staff`.`staff_dob`,
    `staff`.`staff_nic`,
    `staff`.`staff_email`, 
    `staff`.`staff_pno`, 
    `staff`.`staff_date_of_join`,
    `staff`.`staff_gender`, 
    `staff`.`staff_epf`,
    `staff`.`staff_position`,
    `staff`.`staff_type`,
    `staff`.`staff_status`,
    `department`.`department_name`, 
    `staff_position_type`.`staff_position_type_name` 
    FROM `staff` 
    LEFT JOIN 
        `department` 
            ON `staff`.`department_id` = `department`.`department_id` 
    LEFT JOIN 
        `staff_position_type`
            ON `staff`.`staff_position` = `staff_position_type`.`staff_position_type_id` 
    WHERE `staff_id` = '$username'";

$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    $StaffID=$row['staff_id'];
    $StaffName=$row['staff_name'];
    $Address=$row['staff_address'];
    $DOB=$row['staff_dob'];
    $NIC=$row['staff_nic'];
    $Email=$row['staff_email'];
    $PNO=$row['staff_pno'];
    $DOJ=$row['staff_date_of_join'];
    $EPF=$row['staff_epf'];
    $Department_name = $row['department_name'];
    $Gender= $row['staff_gender'];
    $Position= $row['staff_position_type_name'];
    $Type= $row['staff_type'];
}
?>



<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php

$title = "Profile - ".$StaffName." | SLGTI";
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->
<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    // Compute weeks without setting dynamic properties on DateInterval
    $weeks = (int) floor($diff->d / 7);
    $days  = $diff->d - ($weeks * 7);

    $units = array(
        'y' => [$diff->y, 'year'],
        'm' => [$diff->m, 'month'],
        'w' => [$weeks,   'week'],
        'd' => [$days,    'day'],
        'h' => [$diff->h, 'hour'],
        'i' => [$diff->i, 'minute'],
        's' => [$diff->s, 'second'],
    );

    $string = array();
    foreach ($units as $key => $pair) {
        list($val, $label) = $pair;
        if ($val) {
            $string[$key] = $val . ' ' . $label . ($val > 1 ? 's' : '');
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>


<!--BLOCK#2 START YOUR CODE HERE -->
<div class="container">
    <?php if (isset($_GET['updated']) && $_GET['updated'] === '1'): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            Profile updated successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row my-2">
        <div class="col-lg-2 order-lg-1 text-center">

        </div>
    </div>

    <div class="row my-2">
        <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#EnrolledModules" data-toggle="tab" class="nav-link">Enrolled Modules</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Change Password</a>
                </li>
                <li class="nav-item text-right">
                    <a href="library/pdf/profile?username=<?php echo $username;?>" class="nav-link" target="blank">PDF</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <span class="badge badge-dark p-2 mb-1"><i class="fa fa-cog"></i> 43 Enrolled Modules</span>
                            <span class="badge badge-primary p-2 mb-1"><i class="fa fa-user"></i> 900 Feedbacks</span>
                            <span class="badge badge-danger p-2 mb-1"><i class="fa fa-eye"></i> 4.5 Survey Rating</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-3">User Profile</h5>
                        <?php if (!isset($_GET['edit'])): ?>
                            <a class="btn btn-sm btn-outline-primary" href="/Profile.php?edit=1">Edit Profile</a>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($_GET['edit'])): ?>
                        <form method="POST">
                            <input type="hidden" name="action" value="update_profile" />
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" name="staff_name" class="form-control" value="<?php echo htmlspecialchars($StaffName); ?>" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>NIC Number</label>
                                    <input type="text" name="staff_nic" class="form-control" value="<?php echo htmlspecialchars($NIC); ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Gender</label>
                                    <select name="staff_gender" class="form-control">
                                        <option value="Male" <?php echo ($Gender==='Male')?'selected':''; ?>>Male</option>
                                        <option value="Female" <?php echo ($Gender==='Female')?'selected':''; ?>>Female</option>
                                        <option value="Transgender" <?php echo ($Gender==='Transgender')?'selected':''; ?>>Transgender</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Date of Birth</label>
                                    <input type="date" name="staff_dob" class="form-control" value="<?php echo htmlspecialchars($DOB); ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Mobile No.</label>
                                    <input type="text" name="staff_pno" class="form-control" value="<?php echo htmlspecialchars($PNO); ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>E-mail</label>
                                    <input type="email" name="staff_email" class="form-control" value="<?php echo htmlspecialchars($Email); ?>" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" name="staff_address" class="form-control" value="<?php echo htmlspecialchars($Address); ?>" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                <a href="/Profile.php" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <h6>Full Name</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $StaffName;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>E.P.F. No.</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $EPF;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>Position</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $Position;?> <span class="badge badge-primary"><?php echo $Type;?> </span> </h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>Date of Joined</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $DOJ;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>Department</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $Department_name;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>NIC Number</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $NIC;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>Date of Birth</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $DOB;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>E-mail</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $Email;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>Mobile No.</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $PNO;?></h6>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <h6>Address</h6>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h6 class="text-muted"><?php echo $Address;?></h6>
                            </div>
                        </div>
                    <?php endif; ?>
                <!--/row-->
            </div>
            <div class="tab-pane" id="EnrolledModules">
                <table class="table table-hover table-striped">
                    <tbody>
                        <?php
                            $username = $_SESSION['user_name'];
                            $sql_m = "SELECT `staff_module_enrollment`.`course_id`, `staff_module_enrollment`.`module_id`, `staff_module_enrollment`.`academic_year`,`staff_module_enrollment`.`staff_module_enrollment_date`,`module`.`module_name` FROM `staff_module_enrollment` LEFT JOIN `module` ON `module`.`module_id` = `staff_module_enrollment`.`module_id` AND `module`.`course_id` = `staff_module_enrollment`.`course_id` WHERE `staff_module_enrollment`.`staff_id` = '$username'  ORDER BY `staff_module_enrollment`.`staff_module_enrollment_date` DESC";
                            $result_m = mysqli_query($con,$sql_m);
                            while($row_m = mysqli_fetch_assoc($result_m)){
                                echo '
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">'.time_elapsed_string($row_m['staff_module_enrollment_date']).'</span> 
                                    '.$row_m['module_name'].' ['.$row_m['course_id'].'-'.$row_m['module_id'].'] was enrolled in '.$row_m['academic_year'].' academic year.
                                </td>
                            </tr>
                            ';
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="edit">
                <form role="form">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" name="npassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Confirm new password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" name="cpassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <input type="button" class="btn btn-primary" value="Save Changes">
                            <input type="reset" class="btn btn-light" value="Cancel">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
