<!--Block#1 start dont change the order-->
<?php 
$title="Module details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->
<?php
$gcourse_id=$sum=$mid=$cid=null;
?>
	<div class="shadow  p-3 mb-1 bg-white rounded">
	    <div class="highlight-blue">
	        <h1 class="display-4 text-center">Module Details</h1>
	        <!-- <p class="text-center"></p> -->
	    </div>
	</div>

  <div class="row">
	    <div class="col-md-12 col-sm-12">
              <div class="table-responsive table-responsive-sm">
                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr style="text-align:center">
                    <th scope="col">NO.</th>
                    <th scope="col">Module ID</th>
                    <th scope="col">Module Name</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Semester ID </th>
                    <th scope="col">Notional Hours</th>
                    <th scope="col">Options</th>
                    </tr>
                  </thead>

                  <?php
                
                if(isset($_GET['dlt']))
                {
                    
                    $m_id = $_GET['dlt'];
                    $sql = "DELETE from module where module_id = '$m_id'";
                    if(mysqli_query($con,$sql))
                    {
                      echo '
                      <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                      <strong>'.$m_id.' </strong> Record has been Deleted Succesfully 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>  ';
                    }
                    else
                    {
                      echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong> '.$m_id.' </strong> Cannot delete or update a parent row (foreign key constraint fails)
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>  ';               
                     
                    }
                }
                ?>

                  <tbody>
                    
                    <?php
                      $sql = "SELECT `module_id`,
                      `module_name`,
                      `module_learning_hours`,
                      `semester_id`,
                      `module`.`course_id` AS `course_id`,
                      `module_relative_unit`,
                      `module_lecture_hours`,
                      `module_practical_hours`,
                      `module_self_study_hours`,
                      course.course_name as course_name FROM `module`,
                      `course` WHERE module.course_id = course.course_id";
                        if(isset($_GET['course_id']))
                        {
                            $gcourse_id=$_GET['course_id'];
                            $sql.=" AND `module`.`course_id`= '$gcourse_id'";
                        }
                      
                      $result = mysqli_query($con,$sql);
                      
                      if(mysqli_num_rows($result)>0)
                      {
                        $count=1;
                        while($row = mysqli_fetch_assoc($result))
                        { 
                            $mid = $row["module_id"];
                            $cid = $row["course_id"];
                            
                            $sql_r = "SELECT SUM(module_self_study_hours+module_lecture_hours+module_practical_hours) as 'value_sum' FROM module  WHERE module_id='$mid' and course_id='$cid'"; 
                            $result_r = mysqli_query($con,$sql_r);
                            if(mysqli_num_rows($result_r)==1)
                            {
                            $row_r = mysqli_fetch_assoc($result_r);
                            $sum = $row_r['value_sum'];
                            }
                            echo'
                            <tr style="text-align:center">
                              <td>'.$count.'.'. "<br>" .' </td>
                              <td>'. $row["module_id"] . "<br>" .' </td>
                              <td>'. $row["module_name"] . "<br>" .' </td>
                              <td>'. $row["course_name"] . "<br>" .'</td>
                              <td>'. $row["semester_id"] . "<br>" .'</td>
                              <td>'. "$sum". "<br>" .'</td>
                               
                              <td> 
                                    <a href=" AddModule.php ?edits='.$row["module_id"].'  &&  ?edits='.$row["course_id"].' " class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
 
                                    <button data-href=" ?dlt='.$row["module_id"].' &&  ?dlt='.$row["course_id"].' " class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
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
 </div>
<body>

</body>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    