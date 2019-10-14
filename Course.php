	
<!--Block#1 start dont change the order-->
<?php 
$title="Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<hr class="mb-8 mt-4">
		<div class="card mt-12 ">
			<div class="card"><br>
				<h4 align="center">Course Details</h4><br>
      </div>
    </div>
 <br>
 
 

  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Course ID</th>
                      <th>Course Name</th>
                      <th>NVQ Level</th>
                      <th>Department Name</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>

                  <?php

                    if(isset($_GET['dlt']))
                    {
                        
                        $c_id = $_GET['dlt'];

                        $sql = "DELETE from course where course_id = '$c_id' ";

                        if(mysqli_query($con,$sql))
                        {
                            echo"Record has been Deleted Succesfully";
                        }
                        else
                        {
                            echo"Error in Deleting" . mysqli_error($con);
                        }
                    }
                    ?>

                  <tbody>
                  <?php 


                    $sql = "SELECT course.course_id AS course_id, 
                    course.course_name as course_name, 
                    course.course_nvq_level as course_nvq_level,
                    department.department_name as department_name
                    from `course` 
                    left JOIN `department` 
                    ON course.department_id = department.department_id";
                    
                    $result = mysqli_query($con,$sql);

                    if(mysqli_num_rows($result)>0)
                        { 
                          //output data of each row
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '
                                <tr style="text-align:center">
                                    <td>'. $row["course_id"] . "<br>" .'</td>
                                    <td>'. $row["course_name"] .  "<br>" .'</td>
                                    <td>'. $row["course_nvq_level"] .  "<br>" .'</td>
                                    <td>'. $row["department_name"] .  "<br>" .'</td>
                                    
                                    <td> 
                                    <a href=" module.php ?course_id='.$row["course_id"].' "> View module </a>  |

                                    <a href=" Addcourse.php ?course_id='.$row["course_id"].' "> View Edit </a>    
                                    |   
                                    <a href=" ?dlt='.$row["course_id"].' "> Delete </a>  |

                                    <a href=" BatchDetails.php ?course_id='.$row["course_id"].' "> Batch </a> 

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
                
                <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next Page</a>
                </li>
              </ul>
                </nav>
              </div>
              </div>
<body>

</body>


<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  
