<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

                  <div class="col-md-12 col-sm-12 shadow  p-3 mb-5 bg-white rounded">
                  <div class="highlight-blue">
                              <div class="container">
                                  <div class="intro">
                                      <h2 class="display-4 text-center text-primary">Student View Results </h2>
                                      
                                      <p class="text-center">  This section to Results  &nbsp;</p>

                                  </div>
                              </div>
                          </div>
                  </div>
<form method="get" action="">
                  <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Department</label>
                          <select class="browser-default custom-select" name="department_id" id="Departmentx"  onchange="showCouese(this.value)" required>
                          <option value="null" selected disabled >---- Select the Department ---- </option>
                          <?php
               
                          $sql="select * from `department`";
                          $result = mysqli_query($con,$sql);
                          if (mysqli_num_rows($result) > 0 ) {
                          while($row=mysqli_fetch_assoc($result)){
                              echo '<option  value="'.$row["department_id"].'" requird >'.$row["department_name"].'</option>';
               
                            }
                
                          }   
                ?>
                   
                </select>
        
                        </div>                              
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coure</label>
                            <select class="browser-default custom-select" id="course" name="course_id" placeholder="---- Select the Department ---- "
                        required>
                  
                    </select>
                          </div>   
                      </div>

                      <div class="w-100"></div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Academic Year</label>
                            <select class="browser-default custom-select" name="academic_year" id="AcademinYear"   required>
                            <option value="null" selected disabled >---- Select the Academin Year ---- </option>
                            <?php
                            $sql="select * from `academic`";
                            $result = mysqli_query($con,$sql);
                            if (mysqli_num_rows($result) > 0 ) {
                            while($row=mysqli_fetch_assoc($result)){
                                echo '<option  value="'.$row["academic_year"].'" required >'.$row["academic_year"].'</option>';
                            }}   
                            ?>
                            </select>
                          </div>   
                      </div>
                     
                      

                   

                        <div class="col-12">
                         
                          
                          <button type="submit"  class="btn btn-outline-primary">View</button>
                       
                        </div>  
                  </div>
</form>
<br><br>
<?php
    $eid=$cid=$m_id=$ay=$m_name=$f_upld=null;
 if(isset($_GET["department_id"])&& isset($_GET["course_id"])&& isset($_GET["academic_year"])){
     $edid=$_GET["department_id"];
     $cid=$_GET["course_id"];
     $ay=$_GET["academic_year"];
     $sql="SELECT DISTINCT notice_result.module_id as module_id ,
     module.module_name as module_name,
     notice_result.upload as upload 
     from notice_result,module 
     where notice_result.module_id=module.module_id and 
     notice_result.department_id='$edid' and notice_result.academic_year='$ay' and notice_result.course_id='$cid'";
     $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0) {
         while($row=mysqli_fetch_assoc($result)){
            $m_id=$row['module_id'];
            $m_name=$row['module_name'];
            $f_upld=$row['upload'];
      
      
       echo '
       <div class="row">
         <div class="col-sm-12">
           <div class="card">
             <div class="card-body">
               <h4 class="card-title">'.$m_id.'</h4>
               <p class="card-text"> '.$m_name.'</p>
               <img src="https://img.icons8.com/color/48/000000/pdf-2.png"> <a href="docs/result/'.$f_upld.'" > '.$row['upload'].' </a> 
             </div>
           </div>
         </div>
       </div>
       <br>
       ';
        
     
        
         }
        
        }
      } 
?>
<script>   
function showCouese(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $courst_option=this.responseText.trim();
            document.getElementById("course").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "controller/getCourse", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("department=" + val);
}
</script>   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
