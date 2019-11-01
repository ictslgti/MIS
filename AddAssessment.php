<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<div class="shadow p-3 mb-5 bg-white rounded">

    <div class="highlight-blue">
        <div class="container">
            <div class="intro">
                <h1 class="display-4 text-center">Asignments Portal</h1>
                <H3 class="display-5 text-center">Add Assessments</H3>
                <p class="text-center">Welcome to examinations portal for lectures or admin. This section to add
                    examinations and assignments/asessments results&nbsp;</p>

            </div>
        </div>
    </div>
</div>

<!-- end header -->

<?php
$course=$module=$assessments=$academic_year= $assessment_date=null;

if (isset($_POST['Add'])) {

    # code...
    if (!empty($_POST['course']))
    // // &&!empty($_POST['assessments'])
    // &&!empty($_POST['academic_year'])
    // &&!empty($_POST['assessment_date']) 
    // {
        # code...
         $course=$_POST['course'];
         $module=$_POST['module'];
         $assessments=$_POST['assessments'];
         $academic_year=$_POST['academic_year'];
         $assessment_date=$_POST['assessment_date'];

        $sql = "INSERT INTO `assessments` (`course_id`,`module_id`,`assessment_type_id`,`academic_year`,`assessment_date`)
        VALUES ('$course','$module','$assessments','$academic_year','$assessment_date')";


if(mysqli_query($con,$sql))
{
  echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>'.$assessments.'</strong> Assessment Type details inserted!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>   
  ';
}
else{
  
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$assessments.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  
  ';
}




    // }
}



?>
<form class="needs-validation" novalidate method="POST" action="#">

    <div class="container">

        <div class="form-row">
            <div class="col-md-3 mb-2">

                <label for="validationCustom02">Course</label>
                <select
                    class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['course'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course'])){echo ' is-valid';} ?>"
                    id="course" name="course" onchange="showModule(this.value)" required>

                    <option selected>Choose Course...</option>
                    <?php
                  $sql = "SELECT DISTINCT * FROM `assessments_type` ";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<option  value="'.$row["course_id"].'" required>'.$row["course_id"].'</option>';
                  }
                  }else{
                    echo '<option value="null"   selected disabled>-- No Course --</option>';
                  }
                  ?>

                </select>

                <div class="valid-feedback">
                    Looks good!
                </div>

            </div>
            <!-- module -->
            <div class="col-md-3 mb-2">
                <label for="validationCustom02">Module</label>
                <select
                    class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['module'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module'])){echo ' is-valid';} ?>"
                    id="module" name="module" onchange="showAssessments(this.value)" required>
                    <option selected>Choose...</option>

                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>






            </div>






            <div class="col-md-3 mb-2">
                <label for="validationCustom02">Assessments</label>
                <select
                    class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['assessments'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessments'])){echo ' is-valid';} ?>"
                    id="assessments" name="assessments">
                    <option selected>Choose...</option>

                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <label for="validationCustomUsername">Academy Year</label>

                <select
                    class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['academic_year'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['academic_year'])){echo ' is-valid';} ?>"
                    id="academic_year" name="academic_year">
                    <option selected>Choose...</option>
                    <?php
                  $sql = "SELECT *  FROM `academic`";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<option  value="'.$row["academic_year"].'" required>'.$row["academic_year"].'</option>';
                  }
                  }else{
                    echo '<option value="null"   selected disabled>-- No Course --</option>';
                  }
                  ?>


                </select>
                <div class="invalid-feedback">
                    Please choose a Academy Year!
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <label for="">Assessment Date</label>
                <input type="date"
                    class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['assessment_date'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_date'])){echo ' is-valid';} ?>"
                    id="assessment_date" name="assessment_date" value="" placeholder="" required>


            </div>
        </div>

        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">

                <button class="btn btn-success" type="submit" value="Add" name="Add"><i
                        class="fas fa-plus"></i>&nbsp&nbspSave</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"><i
                        class="fab fa-readme"></i>&nbsp&nbsp
                    View Assessments Types
                </button>

            </div>
        </div>
    </div>
    <br>

</form>
<!--  -->

<?php


if(isset($_GET['delete'])){
    $assessment_id = $_GET['delete'];
     $sql = "DELETE FROM `assessments` WHERE `assessment_id` = '$assessment_id'";
    
    if (mysqli_query($con, $sql)){

        
        
        echo '<a class = "text-danger"><div class="fa-1.5x"><i class="fas fa-trash fa-pulse "></i>&nbsp;&nbsp;Delete Success</div></a>';

    }else{
        echo "Error deleting record:" . mysqli_error($con);
    }
}

?>

<!--  -->
<div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Assessments Types</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <th>
                                    <center>Module</center>
                                </th>
                                <th>
                                    <center>Course</center>
                                </th>
                                <th>
                                    <center>Assessments</center>

                                </th>
                                <th>
                                    <center>
                                        Assessment Percentage
                                    </center>
                                </th>



                            </thead>
                            <tbody>

                                <?php
                $sql = "SELECT module_id,course_id,assessment_name,assessment_percentage FROM assessments_type";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)>0) {


                    # code...
                    while ($row = mysqli_fetch_assoc($result)) {

                        # code...
                        echo '
                        <tr>
                        <td><center>'. $row["module_id"]."<br>".'</center></td>
                        <td><center>'. $row["course_id"]."<br>".'</center></td>
                        <td><center>'. $row["assessment_name"]."<br>".'</center></td>
                        <td><center>'. $row["assessment_percentage"]."<br>".'</center></td>
                        
                        </tr>';
                    }
                }
                else {
                    
                    echo "0 results";
                }



?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

</div>

<br>
<br>
<br>


<div class="container">
    <div class="mx-auto" style="width: 200px;">
        <h3 class="display-5">Assessments</h3>
    </div>


    <div>
        <table class="table">
            <thead>
                <th>
                    <center>Assessment ID</center>
                </th>
                <th>
                    <center>Assessment Type</center>
                </th>
                <th>
                    <center>Course</center>

                </th>
                <th>
                    <center>Module</center>
                </th>
                <th>
                    <center>Academy Year</center>
                </th>
                <th>
                    <center>Assessment Date</center>
                </th>
                <th>
                    <center>Action</center>

                </th>
            </thead>
            <tbody>
                <?php
                            $sql = "SELECT assessment_id,assessment_type_id,course_id,module_id,academic_year,assessment_date FROM assessments";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)>0) {
            
            
                                # code...
                                while ($row = mysqli_fetch_assoc($result)) {
            
                                    # code...
                                    echo '
                                    <tr>
                                    <td><center>'. $row["assessment_id"]."<br>".'</center></td>
                                    <td><center>'. $row["assessment_type_id"]."<br>".'</center></td>
                                    <td><center>'. $row["course_id"]."<br>".'</center></td>
                                    <td><center>'. $row["module_id"]."<br>".'</center></td>
                                    <td><center>'. $row["academic_year"]."<br>".'</center></td>
                                    <td><center>'. $row["assessment_date"]."<br>".'</center></td>
                                    <td>
                                    <center>
                                    <a href="AddAssessmentResults.php?StudentMarks='.$row["assessment_id"].'" class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp;Add Student Results</a>
                                    <button  class="btn btn-sm btn-danger" data-href="?delete='.$row["assessment_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i>&nbsp;Delete Results</button>
                                    
                                    
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


    </div>

</div>

</div>






<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
// (function() {
//     'use strict';
//     window.addEventListener('load', function() {
//         // Fetch all the forms we want to apply custom Bootstrap validation styles to
//         var forms = document.getElementsByClassName('needs-validation');
//         // Loop over them and prevent submission
//         var validation = Array.prototype.filter.call(forms, function(form) {
//             form.addEventListener('submit', function(event) {
//                 if (form.checkValidity() === false) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);
//         });
//     }, false);
// }


function showModule(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("module").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getAssessmentType", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("getmodule=" + val);
}




function showAssessments(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("assessments").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getAssessmentType", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("assessmentType=" + val);
}
</script>












</div>



<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>