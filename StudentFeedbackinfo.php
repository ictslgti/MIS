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
                    <h1 class="display-4 text-center text-primary"> -- Feedback Survey --</h1>
                    
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
                   
                      
                                <!-- <h3 class="card-header display-5 text-center text-secondary">   Department of Infromation & communication Techonology</h3> -->
                               
                                  
                                <div class="row table-active border-bottom">
                                    <div class="col-1"><h5>#</h5></div>
                                    <div class="col-2"><h5>Staff Name</h5></div>
                                    <div class="col-3"><h5>Modules</h5></div>
                                    <div class="col-2"><h5>Course</h5></div>
                                    <div class="col-2"><h5>Academin Year</h5></div>
                                    <div class="col-2"><h5>End Date</h5></div>
                                </div>   
                                <?php 

                                    $sql="SELECT `feedback_survey`.`survey_id` AS `survey_id`,
                                    `feedback_survey`.`academic_year` AS `academic_year`,
                                    `course`.`course_id` AS `course_id` ,
                                    `module`.`module_id` AS `module_id`,
                                    `staff`.`staff_id` AS  `staff_id`,
                                    `feedback_survey`.`end_date` AS  `end_date`
                                    from `feedback_survey`,`course`,`module`,`staff` WHERE `feedback_survey`.`course_id`=`course`.`course_id` and `feedback_survey`.`module_id`=`module`.`module_id` and `feedback_survey`.`staff_id`=`staff`.`staff_id`"; 
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                
                                 echo '
                                <div class="row border-bottom">
                                    <div class="col-1">' . $row["survey_id"]. ' </div>
                                    <div class="col-2">' . $row["staff_id"]. '</div>
                                    <div class="col-3">' . $row["module_id"]. '</div>
                                    <div class="col-2">' . $row["course_id"]. '</div>
                                    <div class="col-2">' . $row["academic_year"]. '</div>
                                    <div class="col-2">' . $row["end_date"]. '</div>
                                </div> 

                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-3"> 
                                        | <a href="feedbackForm.php?id='. $row["survey_id"].'" class="text-success"> View</a> | 
                                        <a href="feedbacksummery.php?edit='. $row["survey_id"].'" class="text-info"> Edit</a> |
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
