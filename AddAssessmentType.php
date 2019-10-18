<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!-- add assessment code -->
<?php
echo $_SESSION["user_name"];
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

        $sql = "INSERT INTO `module`(`course_name`,`module_name`,`assessment_type`,`assesment_name`,`assessment_percentage`) 
        VALUES(`$course_name`,`$module_name`,`$assessment_type`,`$assessment_name`,`$assessment_percentage`)";

if(mysqli_query($con,$sql))
{
  echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>'.$assessment_name.'</strong> Assessment Type details inserted!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>    
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
<!-- /add asssessment code -->

<!-- start my code -->
<html>

    <body style="background-color: rgb(255,255,255);">



        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="highlight-blue">

                <div class="container">
                    <div class="intro">
                        <h1 class="display-4 text-center">Asignments Portal</h1>

                        <p class="text-center">Add Assessment Type&nbsp;</p>

                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <form onsubmit="showAssessment(this.value)">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Select
                                    Course&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            <select
                                class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['courser_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['course_id'])){echo ' is-valid';} ?>"
                                id="course" name="course_name" value="<?php echo $course_id; ?>"
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
                    <div class="input-group mb-3">



                    </div>


                </div>
                <!--  -->
                <div class="row">


                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="fas fa-book-open"></i>&nbsp;&nbsp;Select Module&nbsp;</label>
                            </div>
                            <select
                                class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['module_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>"
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
                                class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['assessment_type'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_type'])){echo ' is-valid';} ?>" id="inputGroupSelect01" name="assessment_type" value="<?php echo $assessment_type; ?>">
                                <option selected>Choose...</option>
                                <option value="1">Theory</option>
                                <option value="2">Practical</option>
                            </select>
                        </div>



                    </div>

                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-chalkboard"></i>&nbsp;&nbsp;Asessment Name&nbsp;</span>
                            </div>
                            <input type="text"
                                class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['assessment_name'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_name'])){echo ' is-valid';} ?>" placeholder="
                                Assessment Name" aria-label="Username" aria-describedby="basic-addon1"
                                name="assessment_name" value="<?php echo $assessment_name; ?>">
                        </div>



                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-chalkboard"></i>&nbsp;&nbsp;Asessment Percentage&nbsp;</span>
                            </div>
                            <input type="text"
                                class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['assessment_percentage'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_percentage'])){echo ' is-valid';} ?>" placeholder="
                                Assessment Percentage" aria-label="Username" aria-describedby="basic-addon1"
                                name="assessment_name" value="<?php echo $assessment_name; ?>">
                        </div>



                    </div>
                    <div class="col">

                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">

                            </div>
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus" value="Add"
                                        id="Add"></i> Add Asessments</button>
                            </div>
                            <div class="col col-lg-2">

                            </div>
                        </div>





                    </div>






                </div>


        </form>

        <!--  -->



        <!-- main div -->






        <!-- main div -->


        <div class="container">


        </div>

        <br>

        <br>


        <div class="table-responsive-sm">
            <table class="table">
                <thead>

                    <th>
                        <center>Module</center>
                    </th>
                    <th>
                        <center>Module</center>
                    </th>
                    <th>
                        <center>Module</center>
                    </th>






                </thead>


            </table>
        </div>


        </table>
        </div>
<!-- end my code -->

<script>
    function showModule(val) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Module").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "controller/getModule", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("course=" + val);
    }
</script>


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->

<?php include_once("footer.php"); ?>
<!-- END -->