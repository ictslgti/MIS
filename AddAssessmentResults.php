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

                        <p class="text-center">Welcome to examinations portal for lectures or admin. This section to add
                            examinations and assignments/asessments results&nbsp;</p>

                    </div>
                </div>
            </div>
        </div>




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

            <!-- table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Assessment ID</th>
                        <th scope="col">Student Roll Number</th>
                        
                        <th scope="col">Marks</th>
                        <th scope="col">Attempt</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                        if (isset($_GET['StudentMarks'])) {
                            # code...
                            $id=$_GET['StudentMarks'];
                            $sql = "SELECT assessments.assessment_id, assessments.course_id, assessments.academic_year,assessments.module_id,student_enroll.student_id 
                             
                            FROM `assessments_marks`,student_enroll,assessments  
                            WHERE student_enroll.student_id =assessments_marks.student_id AND assessments.course_id ='$id' group by student_id";

                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result)>0) {
                                # code...
                                while ($row = mysqli_fetch_assoc($result)) {
                                    # code...
                                    echo '
                                    <tr>
                                    <th scope="row">' . $row ["assessment_id"].'</th>
                        <th scope="row">' . $row ["student_id"].'</th>
                        
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter the Marks"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">

                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">1st</option>
                                    <option value="2">Repeat</option>
                                </select>
                            </div>


                        </td>
                        <td scope="row">
                            <h3 class="text-success">Pass</h3>
                        </td>

                                    
                                    
                                    
                                    </tr>';
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

            <!-- end of add table -->
            <br>
            <!-- save button start -->
            <div class="row">
                <div class="col">

                </div>
                <div class="col-md-auto">

                </div>
                <div class="col col-lg-2">
                    <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;<i
                            class="fas fa-save"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
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
            <!-- small view table start  -->
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
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
        function showAssessments(val) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("assessmentsType").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "controller/getAssessmentType", true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("assessmentType=" + val);
        }

        function showAcademyYear(val) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("AcademyYear").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "controller/getAssessmentType", true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("academyYear=" + val);
        }

        function showStudents(val) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("students").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("POST", "controller/getAssessmentType", true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("academyYear=" + val);
        }
        </script>









    </body>

</html>
<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>