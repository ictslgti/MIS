<?php
$title = "assessment | SLGTI";
 include_once("../config.php"); 
 include_once("../head.php"); 
 include_once("../menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!-- add assessment code -->

<!-- /add asssessment code -->

<!-- start my code -->
<html>

    <body style="background-color: rgb(255,255,255);">

        <!--  -->



        <!--  -->



        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="highlight-blue">

                <div class="container">
                    <div class="intro">
                        <h2 class="display-5 text-center">Welcome <?php echo $_SESSION["user_name"];?> to</h2>
                        <h1 class="display-4 text-center">Asignments Portal</h1>

                        <p class="text-center">Add Assessment Type&nbsp;</p>

                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <?php
$course_name=$course_id=$module_name=$assessment_type=$assessment_name=$assessment_percentage=null;

if (isset($_POST['Add'])) {
    if (!empty($_POST['course_name'])  
    &&!empty($_POST['module_name'])
    &&!empty($_POST['assessment_type'])
    &&!empty($_POST['assessment_name'])
    &&!empty($_POST['assessment_percentage'])){

         $course_name=$_POST['course_name'];
         $module_name=$_POST['module_name'];
         $assessment_type=$_POST['assessment_type'];
         $assessment_name=$_POST['assessment_name'];
         $assessment_percentage=$_POST['assessment_percentage'];

         $sql = "INSERT INTO `assessments_type` ( `course_id`, `module_id`, `assessment_name`, `assessment_type`, `assessment_percentage`) 
        VALUES ('$course_name', '$module_name', '$assessment_name', '$assessment_type', '$assessment_percentage')";
if(mysqli_query($con,$sql))
{
  echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>'.$assessment_name.'</strong> Assessment Type details inserted!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>  <script> showAssessmentType(\''.$course_name.'\',\''.$module_name.'\');</script>  
  ';
}
else{
  
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$assessment_name.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  
  ';
}

        # code...
    }
    # code...
}


?>
        <!--  -->
        <form method="POST" action="#">
            <!--  -->
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Select
                                    Course&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            <select
                                class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['course_name'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course_name'])){echo ' is-valid';} ?>"
                                id="course_name" name="course_name" value="<?php echo $course_id; ?>"
                                onchange="showModule(this.value)" required>
                                <option value="null" selected disabled>--Select Course--</option>


                                <?php
                  $sql = "SELECT * FROM `course`";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<option  value="'.$row["course_id"].'" required>'.$row["course_name"].'</option>';
                  }
                  }else{
                    echo '<option value="null"   selected disabled>-- No Course --</option>';
                  }
                  ?>


                            </select>
                        </div>
                    </div>
                    <!--  -->



                </div>
                <!--  -->
                <div class="row">


                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="fas fa-book-open"></i>&nbsp;&nbsp;Select
                                    Module&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            <select
                                class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['module_name'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_name'])){echo ' is-valid';} ?>"
                                id="Module" name="module_name" required>
                                <option value="null" selected disabled>--Select Module--</option>



                            </select>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Select Asignments Type</label>
                            </div>
                            <select
                                class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['assessment_type'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_type'])){echo ' is-valid';} ?>"
                                id="inputGroupSelect01" name="assessment_type" value="<?php echo $assessment_type; ?>">
                                <option value="null" selected disabled>--Select assessment_type--</option>
                                <option value="T">Theory</option>
                                <option value="P">Practical</option>
                            </select>
                        </div>



                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-chalkboard"></i>&nbsp;&nbsp;Asessment
                                    Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input type="text"
                                class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['assessment_name'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_name'])){echo ' is-valid';} ?>"
                                placeholder="Assessment Name" aria-label="Username" aria-describedby="basic-addon1"
                                name="assessment_name" value="<?php echo $assessment_name; ?>">
                        </div>



                    </div>
                </div>


                <div class="row">
                    <div class="col">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-chalkboard"></i>&nbsp;&nbsp;Asessment
                                    Percentage&nbsp;&nbsp;</span>
                            </div>
                            <input type="text"
                                class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['assessment_percentage'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_percentage'])){echo ' is-valid';} ?>"
                                placeholder="Assessment Percentage" aria-label="Username"
                                aria-describedby="basic-addon1" name="assessment_percentage"
                                value="<?php echo $assessment_percentage; ?>" onkeypress="IsInputNumber(event)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">

                            </div>
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-outline-primary" value="Add" name="Add"
                                    onclick="showAssessmentType('aaa','vvv')"><i class="fas fa-plus"></i> Add
                                    Asessments</button>
                            </div>
                            <div class="col col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>









        </form>

        <!--  -->

        <!--  -->



        <!-- main div -->






        <!-- main div -->


        <div class="container">


        </div>

        <br>

        <br>
        <div>
            <h3 class="display-5 text-center">
                Assessment Types Records

            </h3>

        </div>
        <br>

        
        






        <div class="table-responsive-sm">



            <table class="table">
                <thead>
                <th>
                <center>Assessment Type ID</center>
                </th>



                    <th>
                        <center>Module</center>
                    </th>
                    <th>
                        <center>Course</center>
                    </th>
                    <th>
                        <center>Assessment Name</center>
                    </th>
                    <th>
                        <center>Assessment Percentage</center>
                    </th>
                    



                </thead>
                <tbody>

                    <?php
                $sql = "SELECT assessment_type_id,module_id,course_id,assessment_name,assessment_percentage FROM assessments_type";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)>0) {


                    # code...
                    while ($row = mysqli_fetch_assoc($result)) {

                        # code...
                        echo '
                        <tr>
                        <td><center>'. $row["assessment_type_id"]."<br>".'</center></td>
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

        <!-- end my code -->

        <script>
        // function showCouese(val) {
        //     var xmlhttp = new XMLHttpRequest();
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             document.getElementById("course_name").innerHTML = this.responseText;
        //         }
        //     };
        //     xmlhttp.open("POST", "controller/getCourse", true);
        //     xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //     xmlhttp.send("module=" + val);
        // }
        function showAssessmentType(val1, val2) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Module").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "controller/getAssessmentType", true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("course_id=" + val1 + "&module_id=" + val2);


        }

        function showModule(val) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Module").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "controller/getModule", true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("course=" + val);
        }



        function IsInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
                alert("Please Enter Numbers Only For Assessment Percentage!");
            } else if ((/[0-9]/.test(ch))) {



            }

        }
        </script>


        <!--BLOCK#3 START DON'T CHANGE THE ORDER-->

        <?php include_once("../footer.php"); ?>
        <!-- END -->