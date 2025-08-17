<!--START Don't CHANGE THE ORDER-->
<?php 
 $title ="AddStudentFeedback | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");

 $id= $sn =$mn= $cn=$dn= $ay=$sd=  $ed=null;
 if(isset($_GET['edit'])){
     $id=$_GET['edit'];
     $sql="SELECT * FROM `feedback_survey` WHERE `survey_id`=$id";
     $result = mysqli_query($con,$sql);
     if (mysqli_num_rows($result)==1) {
         $row=mysqli_fetch_assoc($result);
        $dn=$row['department_id'];
        $ay=$row['academic_year'];
        $cn=$row['course_id'];
        $mn=$row['module_id'];
        $sn=$row['staff_id'];
        $sd=$row['start_date'];
        $ed=$row['end_date'];

     }
    ?>
    
    <?php   
 }
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


        

    <div class="row">
            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
            
            </div>

             
            <div class="col-md-2 col-sm-12 pl-3 pr-3 pt-2 ">     
                                        
            </div>
            <div class="col-md-2 col-sm-12 pl-3 pr-3 pt-2 ">    
                                         
            </div>
            <div class="col-md-2 col-sm-12 pl-3 pr-3 pt-2 ">
           <!-- <a href> <button type="submit" value="Add" name="add" class="btn btn-success mr-2"><i class="fas fa-eye"></i>&nbsp;&nbsp;View</button> -->
           <a href="StudentFeedbackinfo.php"  name="add" class="btn btn-success" role="button" ><i class="fas fa-eye"></i>&nbsp;&nbsp;View</a>                                   
            </div>   
            
        <div class="w-100"></div>
 
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
                    echo '<option  value="'.$row["department_id"].'" required';
                    if($row["department_id"]== $dn) echo ' selected';
                    echo '>'.$row["department_name"].'</option>';
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
                    echo '<option  value="'.$row["academic_year"].'" required';
                    if($row["academic_year"]== $ay) echo ' selected';
                    echo '>'.$row["academic_year"].'</option>';
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
                  
                    </select>
                </div>                              
            </div>
        
            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <label>  <i class="fas fa-book text-primary">   </i>Module</label>
                    <select class="browser-default custom-select"  id="module" name="module_id" required>
                    
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
                    echo '<option  value="'.$row["staff_id"].'" required';
                    if($row["staff_id"] == $sn) echo ' selected';
                  echo  '>'.$row["staff_name"].'</option>';
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
                    <input type="date" name="start_date" value="<?php echo $sd;?>">
                            
                </div>                              
            </div>

            <div class="col-md-6 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                    <label>  <i class="far fa-calendar-alt text-primary">  </i> End Date</label>
                    <br>
                    <input type="date" name="end_date" value="<?php echo $ed;?>">
                            
                </div> 
            </div>


        <div class="w-100 border-bottom"></div>

            <div class="col-md-12 col-sm-12 pl-3 pr-3 pt-2 ">
                <div class="form-group">
                <!-- <a href="" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" value="add" name="add">create</a> -->
                <!-- <a href="#" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Reset</a> -->
                <!-- <input type="submit" value="add" name="add" class="btn btn-primary btn-lg">  -->
                <?php
                if(isset($_GET['edit'])){
                    echo ' <button type="submit" value="Add" name="update" class="btn btn-primary mr-2"><i class="fas fa-minus"></i>&nbsp;&nbsp;Edit New Survey</button>';
                }else{
                    echo ' <button type="submit" value="Add" name="add" class="btn btn-primary mr-2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Survey</button>';
                }
                ?>
               
                <!-- <a href="AddStudentFeedback"  name="add" class="btn btn-primary" role="button" ><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Survey</a> -->
              
                </div>                              
            </div>
        
    </div> 
    
<!-- </div> -->
</form>

<?php

if(isset($_POST['add'])){

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
            $message ="<h4 class='text-success' >New record created successfully</h4>";
            echo "$message";
        }else{
            echo "Error :-".$sql.
          "<br>"  .mysqli_error($con);
        }
    }
}

if(isset($_POST['update'])){
    if( !empty($_POST['department_id'])&& 
    !empty($_POST['academic_year'])&&
    !empty($_POST['course_id'])&&
    !empty($_POST['module_id'])&& 
    !empty($_POST['staff_id'])&& 
    !empty($_POST['start_date'])&& 
    !empty($_POST['end_date'])){
    $survey_id=$_GET['edit'];
  $department_id =  $_POST['department_id'];
   $academic_year   =  $_POST['academic_year'];
   $course_id   =  $_POST['course_id'];
   $module_id   =  $_POST['module_id'];
   $staff_id  =  $_POST['staff_id'];
   $start_date   =  $_POST['start_date'];
   $end_date   =  $_POST['end_date'];

  $sql="UPDATE  `feedback_survey`
  set `department_id` ='$department_id',
  `academic_year`='$academic_year ',
  `course_id`='$course_id',
  `module_id`='$module_id',
  `staff_id`='$staff_id',
  `start_date`='$start_date',
  `end_date`='$end_date'
  where `feedback_survey`.`survey_id`=$survey_id";
  if(mysqli_query($con,$sql)){
   
    $message ="<h4 class='text-success' >Update successfully</h4>";
            echo "$message";
}else{
    echo "Error :-".$sql.
  "<br>"  .mysqli_error($con);
}
}
}
?>

<script>   

<?php
if(isset($_GET['edit'])){
?>
    showCouese(<?php echo '\''.$dn.'\'';?>);
 
    document.getElementById("course").value = "<?php echo $cn;?>";
    showModule(<?php echo '\''.$cn.'\'';?>);
    document.getElementById("module").value = "<?php echo $mn;?>";
<?php
}
?>




function showCouese(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("course").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getCourse", true);
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
    xmlhttp.open("POST", "controller/getModule", true);
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