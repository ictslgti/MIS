<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
 <?php $_SESSION['user_name']; ?>

<br>
<br>
<br>
<form method="GET">
<div class="input-group mb-3 table container">
    <input type="text" class="form-control" name="sear" placeholder="Studend ID" aria-label="Recipient's username"
        aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="sea" >View</button>
    </div>
</div>
</form>
<br>
<br>
<br>

<form action="" method="POST">

    <div class="table container border border-dark" id="printableArea" style="width: 270mm">
        <div class="col form-group container p-3 mb-2">
            <div class="px-lg-5 container">
                <div>
                    <img src="img/ministry.png" class="rounded float-left;" width="100" height="100" alt="">
                    <img src="img/SLGTI.png" class="rounded float-right" width="250" height="85" alt="">

                </div>
                <hr class="my-1">
                <div>
                    <h1 class="text-center font-weight-bold">Sri Lanka German Training Institute</h1>
                </div>

                
                    <table class="table table-borderless">
                    <thead>
                    <?php
                    $sid=$sname=$dept=null;
  if(isset($_GET['sea'])){
      $id=$_GET['sear'];
       $sql="SELECT DISTINCT 
      `assessments_marks`.`student_id`  ,
      `student`.`student_fullname`,
      `department`.`department_name`
     FROM `assessments_marks`
      LEFT JOIN `student` ON `assessments_marks`.`student_id`=`student`.`student_id` 
      LEFT JOIN `department` ON `department`.`department_id`=`assessments_marks`.`department_id` WHERE `assessments_marks`.`student_id` = '$id' ";
      
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result)==1){
          $row = mysqli_fetch_assoc($result);
          $sid= $row['student_id'];
           $sname= $row['student_fullname'];
           $dept= $row['department_name'];
        
        
  }else{
    echo '<div class="alert alert-warning">
    <strong>Warning!</strong> Invalid data. Please Check Your Data !';
  }
}
               
                   ?>
              <tr>
                       <th style="width: 35mm">Name :</th>
                        <td><?php echo $sname; ?> </td>
                    </tr>
                    <tr>
                        <th style="">Student No :</th>
                        <td><?php echo $sid; ?> </td>
                    </tr>
                    <tr>
                        <th style="">Department :</th>
                        <td><?php echo $dept; ?> </td>
                    </tr>

             </thead>
                    </table>
                    
 
                


                <div class="container px-lg-5">
                    <div class="row mx-lg-n5">
                        <div class="col py-3 px-lg-5 border bg-light">
                            <table class="table">
                            <thead class="thead-dark">
                                    
                                    <tr>
                                        <th scope="col">Modules</th>
                                        <th scope="col">Marks</th>
                                        <th scope="col">Marks grade</th>
                            
                                    </tr>
                               
                                     <?php
                    $mod=$mar=null;
  if(isset($_GET['sea'])){
      $id=$_GET['sear'];
     $sql="SELECT `assessments_marks`.`module_id`,`assessments_marks`.`assessment_marks`,`assessments_marks`.`assessment_marks_grade` from `assessments_marks` where 
     `assessments_marks`.`student_id`='$id'"; 
      
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
           $mod= $row['module_id'];
           $mar=$row['assessment_marks'];
           $marg=$row['assessment_marks_grade'];
            
           
           
           
           
        echo ' 
    </thead>
    <tbody>
        <tr>
            <th scope="row">'.$mod.'</th>
            <td> '.$mar.'</td>
            <td>'.$marg.'</td>
            


        </tr>
        
        
        </thead>
        
        </tbody>';
        
   
                       
      
    
                }
            }
        }
             ?>
             <?php
              $id=$_GET['sear'];
            

             ?>
             


                                
                            </table>

                        </div>

            
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</form>


<?php include_once("footer.php"); ?>git pull
