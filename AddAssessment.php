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
<div class="container">
    <form class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-3 mb-2">
                    
                    <label for="validationCustom02">Course</label>
                            <select class="custom-select" id="course" name="course"  onchange="showAssessments(this.value)" required>
                              <option selected>Choose Course...</option>
                              <?php
                  $sql = "SELECT * FROM `assessments_type`";
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
            <div class="col-md-3 mb-2">
                <label for="validationCustom02">Assessments</label>
                <select class="custom-select" id="Assess" name="assessments">
                        <option selected>Choose...</option>
                        
                      </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <label for="validationCustomUsername">Academy Year</label>
                
                <select class="custom-select" id="inputGroupSelect01">
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
                    <input type="date" class="form-control" id="dob" name="dob" value="" placeholder=""  required>


                </div>
            </div>
        
        <div class="row">
            <div class="col-md-3 mb-2">
                    <button class="btn btn-primary" type="submit">Save</button>

            </div>
                


        </div>
    </div>


        
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();




        function showAssessments(val) {
                             var xmlhttp = new XMLHttpRequest();
                             xmlhttp.onreadystatechange = function () {
                                 if (this.readyState == 4 && this.status == 200) {
                                     document.getElementById("Assess").innerHTML = this.responseText;
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