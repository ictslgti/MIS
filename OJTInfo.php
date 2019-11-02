 <!--START Don't CHANGE THE ORDER-->
 <?php 
$title ="Home | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
 if($_SESSION['user_type']=='STU'){
 ?>
 <!--END Don't CHANGE THE ORDER-->

 <!--START YOUR CODER HERE-->


 <!-- search coding -->
<?php
$StudentID=$Department_id=$StudentName=$DepartmentName=$Finalplace=$Address=null;




  if(isset($_GET['edit'])){
        $StudentID=$_GET['edit'];
        $sql="SELECT `student_name`, `department_name`, `final_place`, `final_address` FROM `ojt` WHERE `student_id`='$StudentID'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $StudentName=$row['student_name']; 
            $DepartmentName=$row['department_name'];
            $Finalplace=$row['final_place'];
            $Address=$row['final_address'];
        }
        else{
          echo "Error".$sql."<br>".mysqli_error($con);
        }
    
  }
  
?>


<!--form-->
 <div class=row>
        <div class="col">
          <br>
          <br>
          <h1 class="text-primary">Find your Training Place</h1>
          <br>
          <br>
          </div>
          </div>
        <div class=row>
        <div class="col">
        <form>
        <div class="form-group">
                        <i class="fas fa-address-card"></i>
                        <label for="StudentID">Student ID</label>
                        <form class="form-inline" method="GET">  
                        <input class="form-control mr-2" type="search" name="edit" placeholder="Student ID"> 
                        <br>
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                        </form>
                    </div>
                    </form>

                    <form>
                    <div class="form-group">
                    
                  
                    <h4 class="text-primary">Your Training Place</h4>
                    <br>
                    <div class="form-group">
                        <i class="fas fa-user-graduate"></i>
                        <label for="stuname">Student Name</label>
                        <input type="text" name= "StudentName" value="<?php echo $StudentName; ?>" class="form-control" >  
                    </div>

                    <br>
                    <div class="form-group">
                    <i class="far fa-building"></i>
                        <label for="stuname">Department Name</label>
                        <input type="text" name= "DepartmentName" value="<?php echo $DepartmentName; ?>" class="form-control" >  
                    </div>

  
                    <div class="form-group">
                        <label for="Rplace"><i class="fas fa-industry"></i>Your Training Place</label>
                        <input type="text" name= "Finalplace"  value="<?php echo $Finalplace; ?>" class="form-control"  >
                    </div>

                    <div class="form-group">
                        <label for="Rplace"><i class="fas fa-map-marker-alt"></i>Training Place Address</label>
                        <input type="text" name= "Address" value="<?php echo $Address; ?>" class="form-control"  >
                    </div>

                    <p> This is your final Traing Place. Approved by Student affair's, SLGTI.</p>
                    <br>
                    <button type="submit" class="btn btn-outline-success" onclick="location.href='index.php'">Okay</button>

                    
                   

                    <div class="form-row pt-3">
                    <?PHP 
                    echo '<div class="btn-group-horizontal">';
  
                    if(isset($_GET['edit'])){
                  
                      
                    }
                    ?>
                    </div>
                        
</form>
</div>


    

<!--END OF YOUR CODER-->
                  <?php } ?>

  <!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
 <!--Don't CHANGE THE ORDER-->