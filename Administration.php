<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="row">
<?php
$sql = "SELECT * FROM `staff_position_type` ORDER BY `staff_position_type`.`staff_position` ASC";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){
echo    '<div class="list-group col-sm-4 p-1">
            <li class="list-group-item d-flex justify-content-between align-items-center ">
                <span class="badge badge-dark">'.$row['staff_position_type_id'].'</span>
                '.$row['staff_position_type_name'].'
            </li>
        </div>';
}
}
?>
</div>

</div>

<div class="row py-4">
    <div class="col-md-12 col-sm-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-Users-tab" data-toggle="tab" href="#nav-Users" role="tab"
                    aria-controls="nav-Users" aria-selected="true">Users</a>
                <a class="nav-item nav-link" id="nav-Courses-tab" data-toggle="tab" href="#nav-Courses" role="tab"
                    aria-controls="nav-Courses" aria-selected="false">Courses</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Contact</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-Users" role="tabpanel" aria-labelledby="nav-Users-tab">
                <div class="row py-4">
                    <div class="col-sm-3">
                        <h4> Accounts </h4>
                    </div>
                    <div class="col-sm-9">
                        <ul class="list-unstyled">
                            <li><a href="#">Browse list of users</a></li>
                            <li><a href="#">Bulk user actions</a></li>
                            <li><a href="#">Add a new user</a></li>
                            <li><a href="#">Upload users</a></li>
                            <li><a href="#">Upload user pictures</a></li>
                            <li><a href="#"> Site administrators</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-Courses" role="tabpanel" aria-labelledby="nav-Courses-tab">
                <div class="row py-4">
                    <div class="col-sm-3">
                        <h4> Courses </h4>
                    </div>
                    <div class="col-sm-9">
                        <ul class="list-unstyled">
                            <li><a href="#">Manage courses and departments</a></li>
                            <li><a href="#">Add a new department</a></li>
                            <li><a href="#">Add a new course</a></li>
                            <li><a href="#">Add a new module</a></li>
                            <li><a href="#">Add a new academic year</a></li>
                            <li><a href="#"> Site administrators</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">C</div>
        </div>

    </div>
</div>

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->