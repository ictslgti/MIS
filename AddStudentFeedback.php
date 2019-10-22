<!--START Don't CHANGE THE ORDER-->
<?php 
 $title ="AddStudentFeedback | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
?>                     
 <!--END Don't CHANGE THE ORDER-->

<!--START YOUR CODER HERE-->
<div class="shadow  p-3 mb-5 bg-white rounded">
<div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h2 class="display-4 text-center text-primary">FEEDBACK Add New Survey </h2>
                    
                    <p class="text-center">  This section to add details. &nbsp;</p>

                </div>
            </div>
        </div>
</div>


<form method="post">

<!-- <div class="border border-primary rounded-lg  mr-5 ml-5 mt-5 mb-5">
    
        <div class="row">
            <div class="col-sm">
                <div class="bg-primary text-warning">
                <h1  style="color:white;"> <i class="fas fa-chart-line"></i> Feedback  info </h1>
                </div>
            </div> 
        </div> -->


    
 

    <div class="row" style="padding:5px">

            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <label> <i class="fas fa-university text-primary"> </i> Department</label>
                <select class="browser-default custom-select" name="department_id" id="Departmentx"  onchange="showCouese(this.value)" required>
                <option value="null" selected disabled >---- Select the Department ---- </option>
                <?php
                $sql="select * from `department`";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
                while($row=mysqli_fetch_assoc($result)){
                    echo '<option  value="'.$row["department_id"].'" required>'.$row["department_name"].'</option>';
                }}   
                ?>
                </select>
                </div>

            </div>
         
            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <label> <i class="fas fa-hourglass-half text-primary"> </i>Academin Year</label>
                <select class="browser-default custom-select" name="academic_year" id="AcademinYear"   required>
                <option value="null" selected disabled >---- Select the Academin Year ---- </option>
                <?php
                $sql="select * from `academic`";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
                while($row=mysqli_fetch_assoc($result)){
                    echo '<option  value="'.$row["academic_year"].'" required>'.$row["academic_year"].'</option>';
                }}   
                ?>
                </select>
                </div>
                                                
            </div>                                     

        <div class="w-100"></div>
        
            <div class="col-md-6 col-sm-12   pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <label><i class="fab fa-discourse text-primary">  </i>Course</label>
                    <select class="browser-default custom-select" id="course" name="course_id" onchange="showModule(this.value)"
                        required>
                    <option value="null" selected>---- Select the Department ----</option>
                    </select>
                </div>                              
            </div>
        
            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <label>  <i class="fas fa-book text-primary">   </i>Module</label>
                    <select class="browser-default custom-select"  id="module" name="module_id" required>
                    <option value="null" selected>---- Select the Department ----</option>
                    </select>
                </div>
            </div>

        <div class="w-100"></div>
       
            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <label>  <i class="fas fa-user-tie text-primary">  </i>Staff Name</label>
                <select class="browser-default custom-select" name="staff_id" id="staff"  required>
                <option value="null" selected disabled >---- Select the Staff ---- </option>
                <?php
                $sql="select * from `staff`";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
                while($row=mysqli_fetch_assoc($result)){
                    echo '<option  value="'.$row["staff_id"].'" required>'.$row["staff_name"].'</option>';
                }}   
                ?>
                </select>
                </div>                              
            </div>

        <div class="w-100"></div>

            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                    <label>  <i class="far fa-calendar-alt text-primary">  </i>Start Date</label>
                    <br>
                    <input type="date" name="start_date" >
                            
                </div>                              
            </div>

            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                    <label>  <i class="far fa-calendar-alt text-primary">  </i> End Date</label>
                    <br>
                    <input type="date" name="end_date" >
                            
                </div> 
            </div>


        <div class="w-100 border-bottom"></div>

            <div class="col-md-12 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <!-- <a href="" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" value="add" name="add">create</a> -->
                <!-- <a href="#" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Reset</a> -->
                <input type="submit" value="add" name="add" class="btn btn-primary btn-lg"> 
              
                </div>                              
            </div>
        
    </div> 
    
<!-- </div> -->
</form>

<?php

if(isset($_POST['add'])){
    echo "aaaa";
    if(!empty($_POST['department_id'])&& 
    !empty($_POST['academic_year'])&&
     !empty($_POST['course_id'])&& 
     !empty($_POST['module_id'])&& 
     !empty($_POST['staff_id'])&& 
     !empty($_POST['start_date'])&& 
     !empty($_POST['end_date'])){
        $department_id=$_POST['department_id'];
        $academic_year=$_POST['academic_year'];
        $course_id=$_POST['course_id'];
        $module_id=$_POST['module_id'];
        $staff_id=$_POST['staff_id'];
        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
      
        $sql="INSERT INTO `feedback_survey` (`department_id`,`academic_year`,`course_id`,`module_id`,`staff_id`,`start_date`,`end_date`) values('$department_id','$academic_year','$course_id','$module_id','$staff_id','$start_date','$end_date')";
        if(mysqli_query($con,$sql)){
            $message ="New record created successfully";
            echo "<script type='text/javascript'> alert('$message');</script>";
        }else{
            echo "Error :-".$sql.
          "<br>"  .mysqli_error($con);
        }
    }
}


?>

<script>      
function showCouese(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("course").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getcourse", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("department=" + val);
}

function showModule(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("module").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getmodule", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("course=" + val);
}

</script> 

       

<!--END OF YOUR CODER-->

<!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
<!--Don't CHANGE THE ORDER-->