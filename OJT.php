 <!--START Don't CHANGE THE ORDER-->
 <?php 
$title ="Home | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
 if($_SESSION['user_type']=='ADM'){
 ?>
 <!--END Don't CHANGE THE ORDER-->

 <!--START YOUR CODER HERE-->

 <?php 
if(isset($_GET['delete'])){
  $student_id = $_GET['delete'];
  $sql = "DELETE FROM `ojt` WHERE `student_id`=$student_id";
 if(mysqli_query($con ,$sql)){
     echo '
     <div class="alert alert-success alert-dismissible fade show" role="alert">
     Student details Deleted successfully
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
     </div>    
   ';
   
 }else{
   echo "error deleting record : ". mysqli_error($con);
 }
 }


?>


<div class="shadow  p-3 mb-1 bg-white rounded">
	    <div class="highlight-blue">
	        <h1 class="display-4 text-center">Student's Final Training Place Details</h1>
	        <!-- <p class="text-center"></p> -->
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-12 col-sm-12">
	        <div class="table-responsive table-responsive-sm">
	            <table class="table table-hover">
	                <thead class="thead-dark">
	                    <tr>
                      <th scope="col">NO.</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Department</th>
                    <th scope="col">Final Place</th>
                    <th scope="col">Final Place Address</th>
                    <th scope="col">Starting Date</th>
                    <th scope="col">Ending Date</th>
	                    </tr>
	                </thead>




	                <tbody>
	                    <?php 
                    $sql = "SELECT `student_id`, `student_name`, `phone_no`, `e_mail`, `department_name`,
                    `final_place`, `final_address`,`starting`,`ending` FROM `ojt`";
                   $result = mysqli_query($con, $sql);

                    if(mysqli_num_rows($result)>0)
                        { 
                            $count=1;
                          //output data of each row
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '
                                <tr>
                                    <td>'. $count.'.'. "<br>" .'</td>
                                    <td scope="row">'. $row["student_id"] . "<br>" .'</td>
                                    <td>'. $row["student_name"] .  "<br>" .'</td>
                                    <td>'. $row["phone_no"] .  "<br>" .'</td>
                                    <td>'. $row["e_mail"] .  "<br>" .'</td>
                                    <td>'. $row["department_name"] .  "<br>" .'</td>
                                    <td>'. $row["final_place"] .  "<br>" .'</td>
                                    <td>'. $row["final_address"] .  "<br>" .'</td>
                                    <td>'. $row["starting"] .  "<br>" .'</td>
                                    <td>'. $row["ending"] .  "<br>" .'</td>
                                     
                                    <td> 
                                

                                    <a href="OJTReport.php ?student_id='.$row["student_id"].' " class="btn btn-sm btn-primary btn-icon-split"> <span class="text">Reqs</span> </a>

                                    <a href="AddTrainingPlace.php ?edit='.$row["student_id"].' " class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>

                                       
                                    <button class="btn btn-sm btn-danger" data-href="?delete='.$row["student_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>                                    
                                    </td> 
                                </tr>';
                                $count=$count+1;
                            }
                        }
                        else
                        {
                            echo "0 results";
                        }
                    ?>

	                </tbody>
	            </table>

                    <?php } ?>

<!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
 <!--Don't CHANGE THE ORDER-->