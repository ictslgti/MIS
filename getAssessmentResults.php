
<!-- print entries from database using PHP -->
<?php
 include_once("config.php");
          //if any button clicked get the button value in a variable 
               if(isset($_POST['id'])){
                    $postchar = (int)$_POST['id'];
                    //multiply the id value by 10 to set SQL OFFSET value
                    $postchar = $postchar*10;                 
                     $query ="SELECT assessments_marks.assessment_marks_id,assessments_marks.module_id,assessments_marks.assessment_id,assessments_marks.student_id,assessments_marks.assessment_attempt,assessments_marks.assessment_marks,assessments_marks.assessment_marks_grade FROM assessments_marks ASC LIMIT 10 OFFSET $postchar";
                }
               else{ 
                    $query = "SELECT assessment_marks_id,module_id,assessment_id,student_id,assessment_attempt,assessment_marks,assessment_marks_grade FROM assessments_marks LIMIT 10 OFFSET 0"; 
                }  
               $result = mysqli_query($con, $query);
            //    if (!$check1_res) {
            //     printf("Error: %s\n", mysqli_error($con));
            //     exit();
            // }
               while($row = mysqli_fetch_array($result)){  
                    echo '  
                         <tr>  
                            <td>'.$row['assessment_marks_id'].'</td>
                            <td>'.$row['module_id'].'</td>
                            <td>'.$row['assessment_id'].'</td>
                            <td>'.$row['student_id'].'</td>
                            <td>'.$row['assessment_attempt'].'</td>
                            <td>'.$row['assessment_marks'].'</td>
                            <td>'.$row['assessment_marks_grade'].'</td>
                            
                            <td>
                            <button  type="button" class="btn btn-danger" data-href="?delete='.$row["assessment_marks_id"].'" data-toggle="modal" data-target="#confirm-delete">Delete Marks </button> </td>
                         </tr>
                         ';  
               } 
          ?>   
