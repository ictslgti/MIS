<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->
<h1> EntrollMent Report </h1>

<div class="table-row">
    <div class="col-md-09 mb-3">
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">student Id</th>
            <th scope="col">Course Id</th>
            <th scope="col">Course mode</th>
            <th scope="col">Accademic Year</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
           $sql = "SELECT `student_id`, `course_id`,`course_mode`, `academic_year` FROM `student_enroll`";
           $result = mysqli_query($con, $sql);
           if (mysqli_num_rows($result)>0)
           {
            $num=1;
               while($row = mysqli_fetch_assoc($result))
                 
                {
                   echo '
                   <tr style="text-align:left";>
                        <td scope="row">'.$num."<br>".'</td>
                        <td>'.$row["student_id"]."<br>".'</td>
                        <td>'.$row["course_id"]."<br>".'</td>
                        <td>'.$row["course_mode"]."<br>".'</td>
                        <td>'.$row["academic_year"]."<br>".'</td>

                   </tr>';
                  $num=$num+1;
                }
                
           }
           else
           {
            echo "0 results";
           }
        ?>
        </tbody>
    </table>
</div>
</div>


<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>