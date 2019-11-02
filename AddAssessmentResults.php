<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START MY CODER HERE -->
<html>

    <body style="background-color: rgb(255,255,255);">



        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="highlight-blue">
                <div class="container">
                    <div class="intro">
                        <h1 class="display-4 text-center">Asignments Portal</h1>

                        <p class="text-center">Welcome <?php echo $_SESSION["user_name"];?> to examinations portal </p>

                    </div>
                </div>
            </div>
        </div>

        <!--  -->

        <?php
         echo $assessment_id=$student_id=$module_id=$assessments_marks=$assessment_attempt=null;

        if (isset($_POST['save'])) {
$sql = null;
//start
if (isset($_GET['StudentMarks'])) {
# code...
$id_x=$_GET['StudentMarks'];
$sql_x = "SELECT assessments.assessment_id, assessments.course_id, assessments.academic_year,assessments.module_id,student_enroll.student_id

FROM `assessments_marks`,student_enroll,assessments
WHERE student_enroll.course_id =assessments.course_id AND assessments.assessment_id ='$id_x' group by student_id";

$result_x = mysqli_query($con, $sql_x);
if (mysqli_num_rows($result_x)>0) {
# code...
while ($row_x = mysqli_fetch_assoc($result_x)) {
     $postnamem = "M".$row_x['student_id'];
     $postnamea = "A".$row_x['student_id'];
     $postnames = "S".$row_x['student_id'];
     $postnamemo = "MO".$row_x['module_id'];
     echo $assessments_marks = $_POST[$postnamem];
     echo $assessment_attempt = $_POST[$postnamea];
     echo $student_id=$_POST[$postnames];
     echo $module_id=$_POST[$postnamemo];
     //insert 
     $sql .= "INSERT INTO `assessments_marks` 
     (`assessment_id`,`module_id`, `student_id`, `assessment_attempt`, `assessment_marks`) 
     VALUES ('$id_x','$module_id','$student_id','$assessment_attempt','$assessments_marks');";
     //end insert

}
}
}
echo $sql;

//end

if(mysqli_multi_query($con,$sql))
{
  echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>'.$assessment_id.'</strong> Assessment Type details inserted!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>   
  ';
}
else{
  
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$assessment_id.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  
  ';
}

}










        ?>






        <!-- main area start-->
        <div class="container">
            <div class="card">
                <br>
                <div class="intro">
                    <h3 class="display-5 text-center">Enter Students Asignments Marks</h3>
                </div>
                <br>
            </div>
            <br>
            <form  method="POST">
                <!-- table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Assessment ID</th>
                            <th scope="col">Student Roll Number</th>
                            <th scope="col">Module</th>

                            <th scope="col">Marks</th>
                            <th scope="col">Attempt</th>
                            <th scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        if (isset($_GET['StudentMarks'])) {
                            # code...
                           echo  $id=$_GET['StudentMarks'];
                         echo $sql = "SELECT assessments.assessment_id, assessments.course_id, assessments.academic_year,assessments.module_id,student_enroll.student_id
                             
                            FROM `assessments_marks`,student_enroll,assessments
                            WHERE student_enroll.course_id =assessments.course_id AND assessments.assessment_id ='$id' group by student_id";

                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)>0) {
                                # code...
                                while ($row = mysqli_fetch_assoc($result)) {
                                    # code...
                                    echo '
                                    <tr>
                                    <th scope="row" id="assessment_id" name="assessment_id">' . $row ["assessment_id"].'</th>
                        <th scope="row" id="student_id" name="student_id">' . $row ["student_id"].'
                        <input type="hidden" name="S' . $row ["student_id"].'" value="' . $row ["student_id"].'" />
                        </th>
                        <th scope="row" id="module_id" name="module_id" >' . $row ["module_id"].'
                        <input type="hidden" name="MO' . $row ["module_id"].'" value="' . $row ["module_id"].'" />
                        </th>
                        
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter the Marks" 
                                    aria-label="Username" aria-describedby="basic-addon1" id="assessments_marks" name="M' . $row ["student_id"].'" required>
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">

                                <select class="custom-select" id="assessment_attempt" name="A' . $row ["student_id"].'">
                                    <option selected>----Choose Attempt--- </option>
                                    <option value="1">Attempt 1</option>
                                    <option value="2">Attempt 2</option>
                                    <option value="3">Attempt 3</option>
                                </select>
                            </div>


                        </td>
                        <td scope="row">
                            <h3 class="text-success">Pass</h3>
                        </td>

                                    
                                    
                                    
                                    </tr>
                                   
                                   ';
                                }
                            }
                            else {
                                # code...
                                echo "0 results";
                            }

                        }




                        ?>








                    </tbody>
                </table>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col-md-auto">

                    </div>
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-outline-primary" name="save" id="save">&nbsp;&nbsp;&nbsp;<i
                                class="fas fa-save"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>
            </form>
            <!-- end of add table -->
            <br>
            <!-- save button start -->

            <!-- save button end -->
            <br>
            <br>
            <br>
            <br>
            <!-- card start -->
            <div class="card">
                <br>
                <div class="container">
                    <div class="intro">
                        <h3 class="display-5 text-center">Overall Module Marks</h3>
                    </div>
                </div>
                <br>
            </div>
            <!-- end card -->
            <br>
            <!-- <div class="row">
                <div class="col">
                    1 of 2
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Student's Index Number"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"
                                id="button-addon2">&nbsp;&nbsp;&nbsp;<i
                                    class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php

if(isset($_GET['delete'])){
    $assessment_marks_id = $_GET['delete'];
     $sql = "DELETE FROM `assessments_marks` WHERE `assessment_marks_id` = '$assessment_marks_id'";
    
    if (mysqli_query($con, $sql)){

        
        
        echo '<button class = "btn btn-danger"><div class="fa-1.5x"><i class="fas fa-trash fa-pulse "></i>&nbsp;&nbsp;Delete Success</div></button>';

    }else{
        echo "Error deleting record:" . mysqli_error($con);
    }
}

?>







            <!-- small view table start  -->
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Marks ID</th>
                        <th scope="col">Assessment ID</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Assessment Attempt</th>
                        <th scope="col">Assessment Marks</th>
                        <th scope="col">Marks Grade</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                            $sql = "SELECT assessment_marks_id,assessment_id,student_id,assessment_attempt,assessment_marks,assessment_marks_grade FROM assessments_marks";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)>0) {
            
            
                                # code...
                                while ($row = mysqli_fetch_assoc($result)) {
            
                                    # code...
                                    echo '
                                    <tr>
                                    <td><center>'. $row["assessment_marks_id"]."<br>".'</center></td>
                                    <td><center>'. $row["assessment_id"]."<br>".'</center></td>
                                    <td><center>'. $row["student_id"]."<br>".'</center></td>
                                    <td><center>'. $row["assessment_attempt"]."<br>".'</center></td>
                                    <td><center>'. $row["assessment_marks"]."<br>".'</center></td>
                                    <td><center>'. $row["assessment_marks_grade"]."<br>".'</center></td>
                                    <td>
                                    <center>
                                    
                                    <button  type="button" class="btn btn-danger" data-href="?delete='.$row["assessment_id"].'" data-toggle="modal" data-target="#confirm-delete">Delete Marks </button>
                                    
                                    
                                    </center>
                                    
                                    </td>
                                    
                                    </tr>';
                                }
                            }
                            else {
                                
                                echo "0 results";
                            }
            
            
            
            ?>






                </tbody>
            </table>
            <!-- small view table end -->
            <!-- print mode start -->

            <br>
            <br>
            <br>
            <br>


            <!-- sinna table -->
            <div class="card">
                <br>
                <div class="container">
                    <div class="intro">
                        <!-- <h3 class="display-5 text-center">Overall Module Marks</h3> -->
                        <div class="row">
                            <div class="col">
                                <h3 class="display-5 text-center">Overall Module Marks</h3>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Student's Index Number"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="button-addon2">&nbsp;&nbsp;&nbsp;<i
                                                class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <br>


            <!-- sinna table thodakkam -->

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Student Index Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Module Marks</th>
                    </tr>
                </thead>
                <tbody>

                
                    
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col">

                </div>
                <div class="col-md-auto">
                    <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;<i
                            class="far fa-edit"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;&nbsp;</button>

                </div>
                <div class="col col-lg-2">
                    <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;<i
                            class="fas fa-print"></i>&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
        <!-- small view table end -->

        <!-- main table container end below -->
        </div>
        <!-- end mode  -->
        <script>



        </script>









    </body>

</html>
<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>