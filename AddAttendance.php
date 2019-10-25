
<!--Block#1 start dont change the order-->
<?php 
$title="Home | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
include_once ("attendancenav.php");

?>
<!-- end dont change the order-->


<?PHP
$RollNumber=$StudentName=$Module=$AttendanceStatus=$AttendanceDate=null;
if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $sql = "SELECT * FROM `timetable` WHERE `time` = '$id'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)==1)
   {
      $row = mysqli_fetch_assoc($result);
      $RollNumber = $row['attendance_id'];
      $StudentName = $row['student_id'];
      $Module = $row['attendance_status'];
      $AttendanceStatus= $row['staff_id'];
      $AttendanceDate = $row['module_id'];
     
  }

}





if(isset($_POST['Add'])){
  echo "ok";

  if(!empty($_POST['attendance_id'])
  &&!empty($_POST['student_id'])
  &&!empty($_POST['attendance_status'])
  &&!empty($_POST['attendance_date'])
  &&!empty($_POST['staff_id'])
  &&!empty($_POST['module_id']))
 
  { 
     echo "ok2";
     echo $department_id   =  $_POST['attendance_id'];
     echo $course_id   =  $_POST['student_id'];
     echo $module_id  =   $_POST['attendance_status'];
     echo $academic_year  =   $_POST['attendance_date'];
     echo $staff_id   =   $_POST['staff_id'];
     echo $weekdays  =  $_POST['module_id'];
  
     echo $sql = "INSERT INTO `attendance` (`attendance_id`, `student_id`, `attendance_status`, `attendance_date`, `staff_id`, `module_id`)
      VALUES ('$attendance_id','$student_id','$attendance_status','$attendance_date','$staff_id','$module_id')";
   
      if (mysqli_query($con, $sql)) {
        echo "record add";
    

      } else {
         echo "Error: " . $sql .
        "<br>" . 	mysqli_error($con);
      
        

      }
  }
}


  ?>









<!-- Block#2 start your code -->

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Attendance List</div>
        <div class="col-md-3" align="right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>
</div>
       
        


         <!-- strt model codee -->
         <div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Attendance</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      

      <div class="form-group">
            <div class="row">
            <label for="inputEmail3" class="col-sm-3  text-right col-form-label">Module<span class="text-danger">*</span></label>
    <div class="col-sm-8"> 
    <select id="inputState" class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['module_id']))
    {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['module_id'])){echo ' is-valid';} ?>"  id="module_id" name="module_id">

        <option selected disabled required >Module</option>


        <?php          
            $sql = "SELECT * FROM `module`";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="'.$row["module_id"].'" required';
                if($row["module_id"]==$module_id) echo ' selected';
                echo '>'.$row["module_name"].'</option>';
                }
            }
            ?>




        </select>
    </div>
  </div>
</div>
          
          <div class="form-group">
            <div class="row">
              <label class="col-md-3 text-right">Attend Date <span class="text-danger">*</span></label>
              <div class="col-md-8">
              <input class="form-control" id="date" name="date" placeholder="From Date" type="text"/>
                <span id="error_attendance_date" class="text-danger"></span>
              </div>
            </div>
          </div>
          

          <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="attendance_table">
      <thead>
       <tr>
       <th scope="col" width="8%" name="student_id">Roll Number <?php  if(isset($_POST['Add']) && empty($_POST['student_id']))
                  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['student_id'])){echo ' is-valid';} ?></th>

       <th scope="col" width="8%" name="student_fullname">">>Student Name <?php  if(isset($_POST['Add']) && empty($_POST['student_fullname']))
                  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['student_fullname'])){echo ' is-valid';} ?></th>

       <th scope="col" width="8%" name="Present">Present <?php  if(isset($_POST['Add']) && empty($_POST['Present']))
                  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Present'])){echo ' is-valid';} ?></th>



        <th scope="col" width="8%" name="Absent">Absent <?php  if(isset($_POST['Add']) && empty($_POST['Absent']))
                  {echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['Absent'])){echo ' is-valid';} ?></th>
 
        
       </tr>
       </thead>
      
       
            <?php
            echo"";
   $sql = "SELECT	student_fullname,student_id,module_id FROM student,module group by student_fullname";
   $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     $count=1;
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
       <tr style="text-align:left";>
         
          <td>'. $row["student_id"]."<br>".'</td>
          <td>'. $row["student_fullname"]."<br>".'</td>
         
       

          <td align="center"> 
            <input type="radio"  name= "' . $count . '"  value="Present">
            
        </td>
        <td align="center">
    <input type="radio"  name="' . $count . '"  value="Absent">
    
        </td>
        </tr>     
                
         ';
         $count=$count+1;
         
         
       

       
     }
   }
   else if ($AttendanceStatus == "Second")
   {
    echo("Second, eh?");
   }
    
  ?>



          
 
 
 
  
               
         
              </table>
            </div>
          </div>
         
  

          <div class="modal-footer">
          <?PHP 
  echo '<div class="btn-group-horizontal">';

    if(isset($_GET['edit']))
    {
      echo '<button type="submit"  class="btn btn-primary mr-2"><i class="fas fa-user-edit"></i>UPDATE</button>'; 
      echo'<button type="reset" value="Reset" class="btn btn-primary mr-2"><i class="fas fa-redo"></i>REFRESH</button>';

    }
    if(isset($_GET['delete']))
    {
      echo '<button type="submit"  class="btn btn-danger mr-2"><i class="fas fa-user-slash"></i>DELETE</button>';

    }
    if(!isset($_GET['delete']) && !isset($_GET['edit'])){
      echo '<button type="submit" value="Add" name="Add" class="btn btn-primary mr-2"><i class="fas fa-user-plus"></i>   ADD</button>';

    }
      
      echo '</div>';
      ?>
          <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
 </div>
  
 
        

         <!--end  model codee -->
         </div>
 </div>
      </div>


    </div>

 

    
    <div class="row">

<div class="col-sm-9 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</div>

   <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="attendance_table">
        <thead>
            <tr>
            <th scope="col" width="8%">Roll Number</th>
              <th scope="col" width="8%">Student Name</th>
              <th scope="col" width="8%">Module</th>
              <th scope="col" width="8%">Attendance Status</th>
              <th scope="col" width="8%">Attendance Date</th>
            </tr>
        
           
            <?php
   $sql = "SELECT	student_id,student_id,module_id,attendance_status,attendance_date FROM attendance";
   $result = mysqli_query ($con, $sql);
   if (mysqli_num_rows($result)>0)
   {
     while($row = mysqli_fetch_assoc($result))
     {
       echo '
       <tr style="text-align:left";>
         
          <td>'. $row["student_id"]."<br>".'</td>
          <td>'. $row["student_id"]."<br>".'</td>
          <td>'. $row["module_id"]."<br>".'</td>
          <td> <span class="badge badge-success">'. $row["attendance_status"]."<br>".'</td>
          <td>'. $row["attendance_date"]."<br>".'</td>
          
         
         
       </tr> ';
     }
   }
   else
   {
     echo "0 results";
   }
    
  ?>
 
 </thead>
        </table>
       
   

        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item ">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
    </div>
   </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</body>
</html>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>



  

<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("menu.php"); ?>  
<!--  end dont change the order-->
