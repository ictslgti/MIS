<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
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
                      }?>
                      <!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->