
<!-- print entries from database using PHP -->
<?php
 include_once("config.php");
          //if any button clicked get the button value in a variable 
               if(isset($_POST['text'])){
                    $postchar = $_POST['text'];
                    // echo $postchar;
                    //multiply the id value by 10 to set SQL OFFSET value 

                    $query = "SELECT course.course_id AS course_id, 
                    course.course_name as course_name, 
                    department.department_name as department_name,
                    course.course_nvq_level as course_nvq_level
                    from `course`,`department` 
                    where course.department_id = department.department_id && `course_id`  = '$postchar'";        
                     //$query ="SELECT * FROM courses LIMIT 10 OFFSET $postchar";
                }
                $result = mysqli_query($con,$query);
                if (mysqli_num_rows($result)!=0){
                    $count=1;
                    while($row = mysqli_fetch_array($result)){
                         echo '
                             <tr>
                                 <td>'. $count.'.'. "<br>" .'</td>
                                 <td scope="row">'. $row["course_id"] . "<br>" .'</td>
                                 <td>'. $row["course_name"] .  "<br>" .'</td>
                                 <td>'. $row["department_name"] .  "<br>" .'</td>
                                 <td>'. $row["course_nvq_level"] .  "<br>" .'</td>
                                         
                                         
                                 <td> 
                                 <a href="Module.php ?course_id='.$row["course_id"].' " class="btn btn-primary btn-sm btn-icon-split"> <span class="text">Modules</span>  </a>  
     
                                 <a href="BatchDetails.php ?course_id='.$row["course_id"].' " class="btn btn-sm btn-primary btn-icon-split"> <span class="text">Batch</span> </a>
     
                                 <a href="AddCourse.php ?edits='.$row["course_id"].' " class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
     
                                     
                                 <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["course_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>                                    
                                 </td> 
                             </tr>';
                             $count=$count+1;
                     }} else { echo "NO RESULT FOUND";} 
          ?>   