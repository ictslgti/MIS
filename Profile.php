<?php
include_once("config.php");

$username = $_SESSION['user_name'];
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

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>


<!--BLOCK#2 START YOUR CODE HERE -->
<div class="container">
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
                    <h5 class="mb-3">User Profile</h5>
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
                            <h6 class="text-muted"><?php echo $Position;?> <span
                                    class="badge badge-primary"><?php echo $Type;?> </span> </h6>
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
                    <div class="col-md-12">
                        <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity
                        </h5>
                        <table class="table table-sm table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>ACHCHUTHAN</strong> joined ACME Project Team in
                                        <strong>`Collaboration`</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Kensington</strong> deleted MyBoard3 in
                                        <strong>`Discussions`</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Skell</strong> deleted his post Look at Why this is.. in
                                        <strong>`Discussions`</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
