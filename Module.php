	
<!--Block#1 start dont change the order-->
<?php 
$title="Module details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<hr class="mb-8 mt-4">
  
		<div class="card mt-12 ">
			<div class="card"><br>
				<h4 style="text-align:center">Module Details</h4><br>
      </div>
    </div>
<br>
<br>

              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="200%" cellspacing="0">
                  <thead>
                    <tr style="text-align:center">
                      <th>Module ID</th>
                      <th>Module Name</th>
                      <th>Course Name</th>
                      <th>Learning Hours</th>
                      <th>Semester ID </th>
                      <th>Semester name </th>
                      <th>Relative Unit</th>
                      <th>Lecture Hours</th>
                      <th>Pracical Hours</th>
                      <th>Self Study Hours</th>
                      <th>Options</th>
                    </tr>
                  </thead>

                  <?php

                

                if(isset($_GET['dlt']))
                {
                    
                    $m_id = $_GET['dlt'];

                    $sql = "DELETE from module where module_id = '$m_id'";

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
                      $sql = "SELECT `module_id`,
                      `module_name`,
                      `module_learning_hours`,
                      `semester_id`,
                      `semester_name`,
                      `module_relative_unit`,
                      `module_lecture_hours`,
                      `module_practical_hours`,
                      `module_self_study_hours`,
                      course.course_name FROM `module`,
                      `course` WHERE module.course_id = course.course_id";

                     
                      
                      $result = mysqli_query($con,$sql);
                      
                      if(mysqli_num_rows($result)>0)
                      {
                        
                        while($row = mysqli_fetch_assoc($result))
                        { 
                            echo'
                            <tr style="text-align:center">
                              <td>'. $row["module_id"] . "<br>" .' </td>
                              <td>'. $row["module_name"] . "<br>" .' </td>
                              <td>'. $row["course_name"] . "<br>" .'</td>
                              <td>'. $row["module_learning_hours"] . "<br>" .'</td>
                              <td>'. $row["semester_id"] . "<br>" .'</td>
                              <td>'. $row["semester_name"] . "<br>" .'</td>
                              <td>'. $row["module_relative_unit"] . "<br>" .'</td>
                              <td>'. $row["module_lecture_hours"] . "<br>" .'</td>
                              <td>'. $row["module_practical_hours"] . "<br>" .'</td>
                              <td>'. $row["module_self_study_hours"] . "<br>" .'</td>

                               
                              <td> 
                                    <a href=" AddModule.php ?module_id='.$row["module_id"].' " class="btn btn-outline-success" style="font-size:15px;><i class="far fa-edit">View Edit</i> </a>
 
                                    <a href=" ?dlt='.$row["module_id"].' " style="font-size:25px;color:red;"> <i class="fas fa-trash"></i> </a>  

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
    
    
  
