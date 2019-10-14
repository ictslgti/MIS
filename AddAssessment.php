<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!-- add assessment code -->
<?php
$semester_id=$module_id=$assessment_type=$assessment_name=null;

if (isset($_POST['Add'])) {
    if (!empty($_POST['semester_id'])
    &&!empty($_POST['module_id'])
    &&!empty($_POST['assessment_type'])
    &&!empty($_POST['assessment_name'])
    ){
        $semester_id=$_POST['semester_id'];
        $module_id=$_POST['module_id'];
        $assessment_type=$_POST['assessment_type'];
        $assessment_name=$_POST['assessment_name'];

        # code...
    }
    # code...
}


?>
<!-- /add asssessment code -->

<!-- start my code -->
<html>

    <body style="background-color: rgb(255,255,255);">
        <?php
            $ictDepartmentName = "Department Of Information & Communication Technology";
            ?>


        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="highlight-blue">

                <div class="container">
                    <div class="intro">
                        <h1 class="display-4 text-center">Asignments Portal</h1>
                        <!-- <H3 class="display-5 text-center"><?php echo $ictDepartmentName ?></H3> -->
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
                                                class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Select Course&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </div>
                                    <select class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['semester_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['semester_id'])){echo ' is-valid';} ?>" id="semister_id" name="semister_id" value="<?php echo $semester_id; ?>"
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
                                        class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Select Semister&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            <select class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['semester_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['semester_id'])){echo ' is-valid';} ?>" id="semister_id" name="semister_id" value="<?php echo $semester_id; ?>"
                                onchange="showModule(this.value)" required>
                                <option value="null" selected disabled>--Select Semister--</option>
                                <!-- <?php 
                                          $row=1;
                                                while($row<=2) {
                                                    
                                                   echo '<option  value="'.$row.'" required>L5 Semister '.$row.'</option>';
                                                   $row++;

                                                   
                                                }
                                            ?> -->

                                <?php
          $sql = "SELECT * FROM `module`";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<option  value="'.$row["semester_id"].'" required>'.$row["semester_name"].'</option>';
          }
          }else{
            echo '<option value="null"   selected disabled>-- No Semester --</option>';
          }
          ?>



                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="fas fa-book-open"></i>&nbsp;&nbsp;Select Module&nbsp;</label>
                            </div>
                            <select class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['module_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>" id="Module" name="module_name" value="<?php echo $module_id; ?>" required>
                                <option value="null" selected disabled>--Select Module--</option>
                                <!-- <option selected>Graphic Design</option>
                                <option value="1">Programming</option>
                                <option value="2">Database 1</option>
                                <option value="3">System Analysis and Design</option>
                                <option value="3">Manage Workplace</option>
                                <option value="3">Manage Workplace & Communication</option> -->
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
                            <select class="custom-select<?php  if(isset($_POST['Add']) && empty($_POST['assessment_type'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_type'])){echo ' is-valid';} ?>"" id="inputGroupSelect01" name="assessment_type" value="<?php echo $assessment_type; ?>">
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
                            <input type="text" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['assessment_name'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['assessment_name'])){echo ' is-valid';} ?>"" placeholder="Assessment Name" aria-label="Username"
                                aria-describedby="basic-addon1" name="assessment_name" value="<?php echo $assessment_name; ?>">
                        </div>




                    </div>




                </div>




            </div>
            <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
    
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus" value="Add" id="Add"></i> Add Asessments</button>
                    </div>
                    <div class="col col-lg-2">
    
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




    </body>




</html>



<!-- end my code -->




<!--BLOCK#3 START DON'T CHANGE THE ORDER-->

<?php include_once("footer.php"); ?>
<!-- END -->

<script>
function showModule(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Module").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getModule", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("semister=" + val);
}
</script>

<?php include_once("footer.php"); ?>