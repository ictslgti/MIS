<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 if($_SESSION['user_type']=='STU' || 'HOD' || 'ADM'){ 
 ?>
<!--END DON'T CHANGE THE ORDER-->



<?php




?>

<div class="shadow p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-4 text-center">View Students Marks</h1>
                    <h4 class="display-5 text-center">Welcome <?php echo $_SESSION["user_name"];?></h4>
                </div>
            </div>
        </div>
    </div>


    
        <div class="row">
            <div class="col">
                <h3 class="display-5 text-center">Overall Module Marks</h3>
            </div>
            <div class="col">
            <form method="GET">
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Student's Index Number"
                                aria-label="Recipient's username" name="searchid" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"
                                    id="button-addon2" name="search">&nbsp;&nbsp;&nbsp;<i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>



            </form>
        
                
            </div>
        </div>




    

    

    <table class="table">
  <thead class="thead-dark">
    <tr>
        <div class="col-sm-10">
      <th scope="col"><i class="fab fa-discourse"></i>&nbsp;&nbsp;Student ID</th>
      <th scope="col"><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Student Name</th>
      
      <th scope="col"><i class="fas fa-book-open"></i>&nbsp;&nbsp;Module</th>
      <th scope="col"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Asessment</th>
    </div>
      <div class="col-sm-2">
      <th><i class="fas fa-angle-down"></i>&nbsp;&nbsp;Assessment Marks</th>
    </div>
    </tr>
  </thead>
  <tbody>

    <?php



    if (isset($_GET['search'])) {
        # code...
        $id= $_GET['searchid'];

        $sql = "SELECT DISTINCT `assessments_marks`.`student_id`,`student`.`student_fullname`,`assessments_marks`.`module_id`,`assessments_marks`.`assessment_id`,`assessments_marks`.`assessment_marks` 
        from `student`
        left join `assessments_marks`on `student`.`student_id`=`assessments_marks`.`student_id`
        where `assessments_marks`.`student_id`='$id'";
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result)>0) {
                  # code...
                  while ($row =mysqli_fetch_assoc($result)) {
                      # code...
                      echo '<tr>
                      <th scope="row">'. $row["student_id"].'</th>
                      <td>'. $row["student_fullname"].'</td>
                      <td>'. $row["module_id"].'</td>
                      <td>'. $row["assessment_id"].'</td>
                      <td>'. $row["assessment_marks"].'</td>
                      
                      
                      
                      
                      </tr>';
                  }
                  
              }

              else{
                echo '<div class="alert alert-danger">
                <strong>Ops!</strong>No Student Results.</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
              </div>
                ';
            }



    }



    ?>









    
  </tbody>
</table>







<!-- END OF MY CODE -->




<?php } ?>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
