<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Student FeedBack Info | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");

// if(isset($_GET['delete_id']))
// {                
//     $survey_id = $_GET['delete_id'];

//     $sql = "DELETE from feedback_survey where survey_id = $survey_id";

//     if(mysqli_query($con,$sql))
//     {
//       echo '
//     <div class="alert alert-sucess alert-dismissible fade show" role="alert">
//       <strong> '.$survey_id.' </strong> Record has been Deleted Succesfully 
//       <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
//         <span aria-hidden="true">&times;</span>
//       </button>
//     </div>
//     ';
//     }
//     else
//     {
//       echo '
//       <div class="alert alert-danger alert-dismissible fade show" role="alert">
//       <strong> '.$survey_id.' </strong> Cannot delete or update a parent row (foreign key constraint fails)
//       <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
//         <span aria-hidden="true">&times;</span>
//       </button>
//     </div>  ';               
     
//     }
// }
?>


<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->


    <div class="shadow  p-3 mb-1 bg-white rounded">
	    <div class="highlight-blue">
	        <h2 class="display-4 text-center  text-primary">-- Create Feedback Survey --</h2>
	        <!-- <p class="text-center"></p> -->
	    </div>
	</div>
<br> <br>

	<div class="row">
	    <div class="col-md-12 col-sm-12">
	        <div class="table-responsive table-responsive-sm">
	            <table class="table table-hover">
	                    <thead class="table-primary">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Staff Name</th>
                                <th scope="col">Modules</th>
                                <th scope="col">Course</th>
                                <th scope="col">Academin Year</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Actions</th>
                            </tr>
	                    </thead>
                            <?php
                            if(isset($_GET['delete_id']))
                            {                
                                $s_id = $_GET['delete_id'];
        
                                $sql = "DELETE from feedback_survey where survey_id ='$s_id'";
        
                                if(mysqli_query($con,$sql))
                                {
                                echo '
                                <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                                <strong> '.$s_id.' </strong> Record has been Deleted Succesfully 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>  ';
                                }
                                else
                                {
                                echo '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> '.$s_id.' </strong> Cannot delete or update a parent row (foreign key constraint fails)
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>  ';               
                                
                                }
                            }
                            ?>
	                    <tbody>
                                <?php 

                                    $sql="SELECT distinct `feedback_survey`.`survey_id` AS `survey_id`,
                                    `feedback_survey`.`academic_year` AS `academic_year`,
                                    `course`.`course_id` AS `course_id` ,
                                    `module`.`module_id` AS `module_id`,
                                    `staff`.`staff_id` AS  `staff_id`,
                                    `feedback_survey`.`end_date` AS  `end_date`
                                    from `feedback_survey`,`course`,`module`,`staff` WHERE 
                                    `feedback_survey`.`course_id`=`course`.`course_id` and 
                                    `feedback_survey`.`module_id`=`module`.`module_id` and 
                                    `feedback_survey`.`staff_id`=`staff`.`staff_id`"; 
                                    
                                            
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                            <tr>
                                                <td>'. $row["survey_id"].' </td>
                                                <td scope="row">'. $row["staff_id"].  "<br>" .'</td>
                                                <td>'. $row["module_id"].  "<br>" .'</td>
                                                <td>' . $row["course_id"].  "<br>" .'</td>
                                                <td>'. $row["academic_year"]. "<br>" .'</td>
                                                <td>'. $row["end_date"]. "<br>" .'</td> 
                                                
                                                <td> 
                                                <a href="Addfbdetail.php?id='. $row["survey_id"].'" class="btn btn-primary btn-sm btn-icon-split"> <span class="text"><i class="fas fa-eye"></i>&nbsp;&nbsp;View</span>  </a>  
                                                <a href="AddStudentFeedback.php?edit='. $row["survey_id"].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a> 
                                                <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["survey_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
                                                <a href="feedbacksurveysummery.php?id='. $row["survey_id"].'" class="btn btn-sm btn-success btn-icon-split"> <span class="text"><i class="fas fa-chart-bar"></i>Summary</span> </a>
                                                
                                                </td> 
                                            </tr>';
                                            
                                        }
                                    }
                                    else
                                    {
                                        echo "0 results";
                                    }
                                ?>

	                    </tbody>
	            </table>
            </div>
        </div>
    </div>


<?php   
//$_SESSION['user_type'];

?>


<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->
