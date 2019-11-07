<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "create a student feedback | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
$eid =$s_staffname = $s_dept = $s_module = $s_edate =null;
$sql="SELECT  DISTINCT `feedback_survey`.`survey_id` AS `survey_id`,`course`.`course_name` AS `course_name` ,
    `module`.`module_name` AS `module_name`,
    `staff`.`staff_name` AS  `staff_name`,
    `feedback_survey`.`end_date` AS  `end_date`
    from `feedback_survey`,`course`,`module`,`staff` ";
 if(isset($_GET['id'])){
    $get_survey_id=$_GET['id'];
    $sql.="WHERE `feedback_survey`.`course_id`=`course`.`course_id` and `feedback_survey`.`module_id`=`module`.`module_id` and `feedback_survey`.`staff_id`=`staff`.`staff_id` and `feedback_survey`.`survey_id`= $get_survey_id"; 
}
    $result = mysqli_query($con,$sql);
   if (mysqli_num_rows($result) == 1) {
        $row=mysqli_fetch_assoc($result);
        $eid=$row["survey_id"]; 
        $s_staffname=$row["staff_name"];
        $s_dept=$row["course_name"];
        $s_module= $row["module_name"];
        $s_edate=$row["end_date"];
   
    }

?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<form method="post" action="">

       

            <div class="row">
                    <div class="col-md-12 col-sm-12"> <h3 class="mb-4 text-success">Course Name :&nbsp; <?php echo   $s_dept; ?> </h3></div>
                
                <div class="w-100"></div>
                <div class="col-md-3 col-sm-12"><h6 class="mb-4"> Module Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6></div>
                <div class="col-md-9 col-sm-12"> <?php echo '<h4>' .  $s_module . '</h4>'; ?></div>
                <div class="w-100"></div>
                <div class="col-md-3 col-sm-12"><h6 class=" mb-4">Staff Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6></div>
                <div class="col-md-9 col-sm-12"> <?php echo '<h4>' .$s_staffname. '</h4>'; ?></div>
                <div class="w-100"></div>
                <div class="col-md-3 col-sm-12"><h6 class=" mb-4">Survey ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6></div>
                <div class="col-md-9 col-sm-12"><?php echo '<h4>' .  $eid . '</h4>'; ?></div>    
                <div class="w-100"></div>
                <div class="col-md-3 col-sm-12"><h6 class=" mb-4">End Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6></div>
                <div class="col-md-9 col-sm-12"><?php echo '<h4 class="text-danger">' .  $s_edate . '</h4>'; ?></div>   
            </div>


   
                    <div class="col-12">
                    <div class="col-md-12 col-sm-12  form-group border-top mb-4">
                    <h2  class="pt-2 text-primary" align="center" > Feedback Survey Summery &#128515;  &nbsp;   &#128531; &nbsp; &#128555; </h2>
                    </div>

<?php
 
if(isset($_GET['id'])){
    $get_survey_id=$_GET['id'];
    $sql="SELECT * from feedback_done WHERE survey_id='$get_survey_id'";
}
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) == 1) {
    $row=mysqli_fetch_assoc($result);
 
    include_once("include_feedbacksummery.php");


}else{

}
?>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->