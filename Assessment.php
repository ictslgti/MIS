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
                                aria-label="Recipient's username" aria-describedby="button-addon2">
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
      <th scope="col"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Academy Year</th>
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
        $id= $_GET['search'];

        $sql = "SELECT * FROM `assessment_results` WHERE `student_id`='$id'";
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result)>0) {
                  # code...
                  while ($row =mysqli_fetch_assoc($result)) {
                      # code...
                      echo '<tr>
                      <th scope="row">'. $row["student_id"].'</th>
                      <td>'. $row["student_name"].'</td>
                      <td>'. $row["module_id"].'</td>
                      <td>'. $row["assessment_id"].'</td>
                      <td>'. $row["assessment_marks"].'</td>
                      
                      
                      
                      
                      </tr>';
                  }
                  
              }

              else{
                echo "No more Requests";
            }



    }



    ?>









    
  </tbody>
</table>







<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
