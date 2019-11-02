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
  $sql = "DELETE FROM `manage_final_place` WHERE `student_id`=$student_id";
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

<?php
    $student_id = $StudentName = $PNO = $Email = $DepartmentName = $Finalplace = $Address = null;

    // edit coding
    if(isset($_GET['edit']))
    {
      echo $student_id =$_GET['edit'];
      echo $sql = "SELECT `student_id`, `student_name`, `phone_no`, `e_mail`, `department_name`, `final_place`, `final_address` FROM `ojt` WHERE `student_id`='$StudentID'";
      $result = mysqli_query($con,$sql);

      if(mysqli_num_rows($result)==1)
        {
          echo "welcom";
        $row =mysqli_fetch_assoc($result);
        $StudentID=$row['student_id'];
        $StudentName=$row['student_name']; 
        $PNO=$row['phone_no'];
        $Email=$row['e_mail'];
        $DepartmentName=$row['department_name'];
        $Finalplace=$row['final_place'];
        $Address=$row['final_address'];;
      }
      else{
        echo "Error".$sql."<br>".mysqli_error($con);
          }
  
    }
    ?>




<div class="shadow  p-3 mb-1 bg-white rounded">
	    <div class="highlight-blue">
	        <h1 class="display-4 text-center">Manage Student's Final Training Place</h1>
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
                    <th scope="col">Department</th>
                    <th scope="col">Requested Place</th>
                    <th scope="col">Requested Place Address</th>
                    <th scope="col">District 1</th>
                    <th scope="col">District 2</th>
                    <th scope="col">Comments</th>
	                    </tr>
	                </thead>




	                <tbody>
	                    <?php 
                    $sql = "SELECT `student_id`, `student_name`, `department_name`,`requested_place`, `requested_address`, 
                    `requested_district1`, `requested_district2`, `comment_1` FROM `manage_final_place`";
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
                                    <td>'. $row["department_name"] .  "<br>" .'</td>
                                    <td>'. $row["requested_place"] .  "<br>" .'</td>
                                    <td>'. $row["requested_address"] .  "<br>" .'</td>
                                    <td>'. $row["requested_district1"] .  "<br>" .'</td>
                                    <td>'. $row["requested_district2"] .  "<br>" .'</td>
                                    <td>'. $row["comment_1"] .  "<br>" .'</td>
                                    
                                    
                                    
                                    <td> 
                                    

                                    

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

                

	            



    

<!--END OF YOUR CODER-->
                      <?php } ?>

  <!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
 <!--Don't CHANGE THE ORDER-->