<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Department Details | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");

 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->

<form method="post">
<div class="shadow  p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-4 text-center"> -- Feedback Survey --</h1>
                    
                    <p class="text-center"> This Contant to Add Feedback.&nbsp;</p>

                </div>
            </div>
        </div>
    </div>
    <!-- <a href="AddDepartment" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add New Department </a> -->



<!-- <h1 class="col text-center">Department Details</h1> -->
<br><br>
<div class="row">
                    <div class="col-sm-12">
                   
                        <div class="card border-secondary ">
                                <!-- <h3 class="card-header display-5 text-center text-secondary">   Department of Infromation & communication Techonology</h3> -->
                                <div class="card-body">
                                 
                                  
                                <div class="row border-bottom">
                                    <div class="col-1"><h6>#</h6></div>
                                    <div class="col-2"><h6>Staff Name</h6></div>
                                    <div class="col-3"><h6>Modules</h6></div>
                                    <div class="col-2"><h6>Course</h6></div>
                                    <div class="col-2"><h6>Academin Year</h6></div>
                                    <div class="col-2"><h6>End Date</h6></div>
                                </div>   
                                <?php 

                                    $sql="SELECT `survey`.`survey_id` AS `survey_id`,
                                    `survey`.`academin_year` AS `academin_year`,
                                    `course`.`course_name` AS `course_name` ,
                                    `module`.`module_name` AS `module_name`,
                                    `staff`.`staff_name` AS  `staff_name`,
                                    `survey`.`end_date` AS  `end_date`
                                    from `survey`,`course`,`module`,`staff` WHERE `survey`.`course_name`=`course`.`course_id` and `survey`.`module_name`=`module`.`module_id` and `survey`.`staff_name`=`staff`.`staff_id`"; 
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                
                                 echo '
                                <div class="row border-bottom">
                                    <div class="col-1">' . $row["survey_id"]. ' </div>
                                    <div class="col-2">' . $row["staff_name"]. '</div>
                                    <div class="col-3">' . $row["module_name"]. '</div>
                                    <div class="col-2">' . $row["course_name"]. '</div>
                                    <div class="col-2">' . $row["academin_year"]. '</div>
                                    <div class="col-2">' . $row["end_date"]. '</div>
                                </div> 

                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-3"> 
                                        | <a href="AddStudentFeedback.php?id='. $row["survey_id"].'" class="text-success"> View</a> | 
                                        <a href="feedbacksummeryedit.php?edit='. $row["survey_id"].'" class="text-info"> Edit</a> |
                                        <a href="?delete='. $row["survey_id"]. ' " class="text-danger"> Delete</a> |
                                    </div>
                                </div> 
                                ';
                                }
                                } else {
                                echo "0 results";
                                }
                                ?>
                                </div>
                        </div>

                        
                    </div>
                </div>
  </form>
</table>
</div>
<br>
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->
