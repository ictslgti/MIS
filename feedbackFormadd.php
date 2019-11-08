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
    from `feedback_survey`,`course`,`module`,`staff`";
 if(isset($_GET['id'])){
    $get_survey_id=$_GET['id'];
    $sql.="WHERE `feedback_survey`.`course_id`=`course`.`course_id` and `feedback_survey`.`module_id`=`module`.`module_id` and `feedback_survey`.`staff_id`=`staff`.`staff_id` and `feedback_survey`.`survey_id`= $get_survey_id"; 
} else {
    echo 'no id';
}
    $result = mysqli_query($con,$sql);
   if (mysqli_num_rows($result) == 1) {
        $row=mysqli_fetch_assoc($result);
        $eid=$row["survey_id"]; 
        $s_staffname=$row["staff_name"];
        $s_dept=$row["course_name"];
        $s_module= $row["module_name"];
        $s_edate=$row["end_date"];
    }else{
        echo "Error :-".$sql.
        "<br>".mysqli_error($con).;
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


<?php 
$C_date=date('Y-m-d');
if($_SESSION['user_type']  == 'STU'){

echo $s_edate < $C_date ?

        '<h3 class="text-danger border-bottom"> Your Feedback Submit Date Closed !! &nbsp;&nbsp;<i class="far fa-frown"></i></h3>       
    
':
'
     
                    <div class="col-12">
                    <div class="col-md-12 col-sm-12  form-group border-top mb-4">
                    <h2  class="pt-2">Dear Student</h2>
                    </div>




                    <div class="row ">
                    <div class="col">
                    <p>  Thanks you for participating in our survery about educational quality at SLGTI . The infromation you provide 
                        will enable us to asscess current quality and identify measures required to improve educational quality at 
                        SLGTI. Infromation provided is confidential and will be used solely within the framework of this survey 
                        We will not disclose your personal infromation to third parties except in respose to legal requirment. </p>
                    </div>
                    </div>



                    <div class="row ">
                    <div class="col">  
                        <div class="text-success"> 5 = "Strongly agree " </div>
                        <div class="text-warning"> 4 = "Agree"  </div>
                        <div class="text-primary">  3 = "Neutral"  </div>
                        <div class="text-secondary">   2 = "Disagree"  </div>
                        <div class="text-danger">  1 = "Strongly Disagree"  </div> 
                    </div>
                    </div>

                    <div class="row">
                    <div class="col">
                    <br>
                    </div>
                    </div>

                    <div class="row ml-2">
                    <div class="col">
                    </div>
                    </div>


                    <div class="row">
                    <div class="col">
                    <br>
                    </div>
                    </div>
  

                        <div class="row border-bottom mb-4 " >
                            <div class="col-md-12 col-sm-12">
                            <h5>General Conditions & Module Evaluation :Questions concerning the teaching situation at SLGTI</h5>
                            </div>
                        </div>


                        <div class="row border-bottom  mb-4 " >
                            <div class="col-md-6 col-sm-12">
                            The class size / group makes it comfortable to study effectively
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="fb1a" value="1" name="feedback_q1" required/>
                                    <label class="custom-control-label" for="fb1a">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" class="custom-control-input" id="f1b2b" value="2" name="feedback_q1"  required/>
                                    <label class="custom-control-label" for="f1b2b">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="fb3c" value="3" name="feedback_q1" required/>
                                    <label class="custom-control-label" for="fb3c">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="fb4d" value="4" name="feedback_q1" required/>
                                          <label class="custom-control-label" for="fb4d">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="fb5e" value="5" name="feedback_q1" required />
                                          <label class="custom-control-label" for="fb5e">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom  mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The facilities provided enable effective learning
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb1f" value="1" name="feedback_q2" required/>
                                <label class="custom-control-label" for="fb1f">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb2g" value="2" name="feedback_q2" required/>
                                          <label class="custom-control-label" for="fb2g">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb3h" value="3" name="feedback_q2" required/>
                                          <label class="custom-control-label" for="fb3h">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb4i" value="4" name="feedback_q2" required/>
                                          <label class="custom-control-label" for="fb4i">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5j" value="5" name="feedback_q2" required/>
                                          <label class="custom-control-label" for="fb5j">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4">
                            <div class="col-md-6 col-sm-12">
                            The concept of the module and its content provide a perfect balance of theoretical and practical content
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb1k" value="1" name="feedback_q3" required/>
                                          <label class="custom-control-label" for="fb1k">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb2l" value="2" name="feedback_q3" required/>
                                          <label class="custom-control-label" for="fb2l">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb3m" value="3" name="feedback_q3" required/>
                                          <label class="custom-control-label" for="fb3m">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb4n" value="4" name="feedback_q3" required/>
                                          <label class="custom-control-label" for="fb4n">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5o" value="5" name="feedback_q3" required />
                                          <label class="custom-control-label" for="fb5o">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4" >
                            <div class="col-md-6 col-sm-12">
                            The module content provides an high level of difficulty
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5p" value="1" name="feedback_q4" required/>
                                          <label class="custom-control-label" for="fb5p">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5q" value="2" name="feedback_q4" required/>
                                          <label class="custom-control-label" for="fb5q">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5r" value="3" name="feedback_q4" required/>
                                          <label class="custom-control-label" for="fb5r">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5s" value="4" name="feedback_q4" required/>
                                          <label class="custom-control-label" for="fb5s">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5t" value="5" name="feedback_q4" required/>
                                          <label class="custom-control-label" for="fb5t">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The module content provides practical applicability
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5u" value="1" name="feedback_q5" required/>
                                          <label class="custom-control-label" for="fb5u">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5x" value="2" name="feedback_q5" required/>
                                          <label class="custom-control-label" for="fb5x">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5y" value="3" name="feedback_q5" required/>
                                          <label class="custom-control-label" for="fb5y">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb5z" value="4" name="feedback_q5" required/>
                                          <label class="custom-control-label" for="fb5z">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51a" value="5" name="feedback_q5" required/>
                                          <label class="custom-control-label" for="fb51a">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4">
                            <div class="col-md-6 col-sm-12">
                            The module / course material help me understand the lesson <br> (script , hand-out , etc)
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51b" value="1" name="feedback_q6" />
                                          <label class="custom-control-label" for="fb51b">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51c" value="2" name="feedback_q6" required/>
                                          <label class="custom-control-label" for="fb51c">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51d" value="3" name="feedback_q6" required/>
                                          <label class="custom-control-label" for="fb51d">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51e" value="4" name="feedback_q6" required/>
                                          <label class="custom-control-label" for="fb51e">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51f" value="5" name="feedback_q6" required/>
                                          <label class="custom-control-label" for="fb51f">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Thee workload of the module is reasonable
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51g" value="1" name="feedback_q7" required/>
                                          <label class="custom-control-label" for="fb51g">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51h" value="2" name="feedback_q7" required/>
                                          <label class="custom-control-label" for="fb51h">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51i"  value="3" name="feedback_q7" required/>
                                          <label class="custom-control-label" for="fb51i">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51j"  value="4" name="feedback_q7" required/>
                                          <label class="custom-control-label" for="fb51j">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51k" value="5" name="feedback_q7" required/>
                                          <label class="custom-control-label" for="fb51k">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Internet access is provided to encourage e-learning
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51l" value="1" name="feedback_q8" required/>
                                          <label class="custom-control-label" for="fb51l">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51m" value="2" name="feedback_q8" required/>
                                          <label class="custom-control-label" for="fb51m">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51n" value="3" name="feedback_q8" required/>
                                          <label class="custom-control-label" for="fb51n">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51o" value="4" name="feedback_q8" required/>
                                          <label class="custom-control-label" for="fb51o">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51p" value="5" name="feedback_q8" required/>
                                          <label class="custom-control-label" for="fb51p">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Overall , I am satisfied with this module
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51q" value="1" name="feedback_q9" required/>
                                          <label class="custom-control-label" for="fb51q">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51r" value="2" name="feedback_q9" required/>
                                          <label class="custom-control-label" for="fb51r">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51s" value="3" name="feedback_q9" required/>
                                          <label class="custom-control-label" for="fb51s">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51t" value="4" name="feedback_q9" required/>
                                          <label class="custom-control-label" for="fb51t">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb51u" value="5" name="feedback_q9" required/>
                                          <label class="custom-control-label" for="fb51u">5</label>
                                </div>
                            </div>
                        </div>
        
<!--2nd-->
    <div class="row">
            <div class="col-12">
                        <div class="row border-bottom mb-4 " >
                            <div class="col-md-12 col-sm-12">
                            <h5>Teacher Evaluation : <br> Questions concerning the teacher performance at SLGTI</h5>
                            </div>
                        </div>


                        <div class="row border-bottom  mb-4 " >
                            <div class="col-md-6 col-sm-12">
                            The teacher explains the subject clearly and in ways that are easy
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="fa1a" value="1" name="feedback_q10" required/>
                                    <label class="custom-control-label" for="fa1a">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fb2b" value="2" name="feedback_q10" required/>
                                          <label class="custom-control-label" for="fb2b">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fc3c" value="3" name="feedback_q10" required />
                                          <label class="custom-control-label" for="fc3c">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fd4d" value="4" name="feedback_q10" required/>
                                          <label class="custom-control-label" for="fd4d">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fe5e" value="5" name="feedback_q10" required/>
                                          <label class="custom-control-label" for="fe5e">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom  mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher is knowledgeable in the subject area
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ff1f" value="1" name="feedback_q11" required/>
                                <label class="custom-control-label" for="ff1f">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fg2g" value="2" name="feedback_q11" required/>
                                          <label class="custom-control-label" for="fg2g">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fh3h" value="3" name="feedback_q11" required/>
                                          <label class="custom-control-label" for="fh3h">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fi4i" value="4" name="feedback_q11" required/>
                                          <label class="custom-control-label" for="fi4i">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fj5j" value="5" name="feedback_q11" required/>
                                          <label class="custom-control-label" for="fj5j">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher is well prepared and organized for class
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fk1k" value="1" name="feedback_q12" required/>
                                          <label class="custom-control-label" for="fk1k">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fl2l" value="2" name="feedback_q12" required/>
                                          <label class="custom-control-label" for="fl2l">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fm3m" value="3" name="feedback_q12" required/>
                                          <label class="custom-control-label" for="fm3m">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fn4n" value="4" name="feedback_q12" required/>
                                          <label class="custom-control-label" for="fn4n">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fo5o" value="5" name="feedback_q12" required/>
                                          <label class="custom-control-label" for="fo5o">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher is enthusiastic about teaching the course and stimulates student interest
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fp5p" value="1" name="feedback_q13" required />
                                          <label class="custom-control-label" for="fp5p">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fq5q"  value="2" name="feedback_q13" required/>
                                          <label class="custom-control-label" for="fq5q">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fr5r" value="3" name="feedback_q13" required/>
                                          <label class="custom-control-label" for="fr5r">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fs5s" value="4" name="feedback_q13" required/>
                                          <label class="custom-control-label" for="fs5s">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ft5t" value="5" name="feedback_q13" required/>
                                          <label class="custom-control-label" for="ft5t">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher uses a variety of teaching methods (discussion , group work , <br> presentation , practical examples , etc.) during class time , and makes the  <br> lesson interesting
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fu5u" value="1" name="feedback_q14" required/>
                                          <label class="custom-control-label" for="fu5u">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fx5x" value="2" name="feedback_q14" required/>
                                          <label class="custom-control-label" for="fx5x">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fy5y" value="3" name="feedback_q14" required/>
                                          <label class="custom-control-label" for="fy5y">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="fz5z" value="4" name="feedback_q14" required/>
                                          <label class="custom-control-label" for="fz5z">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ab51a" value="5" name="feedback_q14" required/>
                                          <label class="custom-control-label" for="ab51a">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The module / course material help me understand the lesson <br> (script , hand-out , etc)
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="bb51b" value="1" name="feedback_q15" required/>
                                          <label class="custom-control-label" for="bb51b">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="cb51c" value="2" name="feedback_q15" required/>
                                          <label class="custom-control-label" for="cb51c">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="db51d" value="3" name="feedback_q15" required/>
                                          <label class="custom-control-label" for="db51d">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="eb51e" value="4" name="feedback_q15" required/>
                                          <label class="custom-control-label" for="eb51e">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ffb51f" value="5" name="feedback_q15" required/>
                                          <label class="custom-control-label" for="ffb51f">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Thee workload of the module is reasonable
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="gb51g" value="1" name="feedback_q16" required/>
                                          <label class="custom-control-label" for="gb51g">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="hb51h" value="2" name="feedback_q16" required/>
                                          <label class="custom-control-label" for="hb51h">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ib51i" value="3" name="feedback_q16" required/>
                                          <label class="custom-control-label" for="ib51i">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="jb51j" value="4" name="feedback_q16" required />
                                          <label class="custom-control-label" for="jb51j">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="kb51k" value="5" name="feedback_q16" required/>
                                          <label class="custom-control-label" for="kb51k">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4">
                            <div class="col-md-6 col-sm-12">
                            Internet access is provided to encourage e-learning
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="lb51l" value="1" name="feedback_q17" required />
                                          <label class="custom-control-label" for="lb51l">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="mb51m" value="2" name="feedback_q17" required/>
                                          <label class="custom-control-label" for="mb51m">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="nb51n" value="3" name="feedback_q17" required/>
                                          <label class="custom-control-label" for="nb51n">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ob51o" value="4" name="feedback_q17" required/>
                                          <label class="custom-control-label" for="ob51o">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="pb51p" value="5" name="feedback_q17" required/>
                                          <label class="custom-control-label" for="pb51p">5</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Overall , I am satisfied with this module
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="qb51q" value="1" name="feedback_q18" required/>
                                          <label class="custom-control-label" for="qb51q">1</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="rb51r" value="2" name="feedback_q18" required/>
                                          <label class="custom-control-label" for="rb51r">2</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="sb51s" value="3" name="feedback_q18" required/>
                                          <label class="custom-control-label" for="sb51s">3</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tb51t" value="4" name="feedback_q18" required/>
                                          <label class="custom-control-label" for="tb51t">4</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ub51u" value="5" name="feedback_q18" required/>
                                          <label class="custom-control-label" for="ub51u">5</label>
                                </div>
                            </div>
                        </div>
            </div>
    </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="feedback_commond" required></textarea>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                   
                       
                        <input type="submit" value="submit" name="add" class="btn btn-primary btn-lg btn-block">
                      </div>
                    </div>
                </div>



'; }
else{
     $message ="<h1 class='text-secondary mt-5'  align='center'>This Feedback Survey was create for every Student</h1> <h1 align='center'>&#128528; &nbsp;  &#128549; &nbsp; &#128512;</h1>";
     echo "$message";
  
}
 ?>

</form>

<?php

$survey_id=$eid; 

    if (isset($_POST['add'])) {
        if (!empty($_POST['feedback_q1'])&&!empty($_POST['feedback_q2'])&&
        !empty($_POST['feedback_q3'])&&!empty($_POST['feedback_q4'])&&
        !empty($_POST['feedback_q5'])&&!empty($_POST['feedback_q6'])&&
        !empty($_POST['feedback_q7'])&&!empty($_POST['feedback_q8'])&&
        !empty($_POST['feedback_q9'])&&!empty($_POST['feedback_q10'])&&
        !empty($_POST['feedback_q11'])&&!empty($_POST['feedback_q12'])&&
        !empty($_POST['feedback_q13'])&&!empty($_POST['feedback_q14'])&&
        !empty($_POST['feedback_q15'])&&!empty($_POST['feedback_q16'])&&
        !empty($_POST['feedback_q17'])&&!empty($_POST['feedback_q18'])&&!empty($_POST['feedback_commond'])){
            $feedback_q1 = $_POST['feedback_q1'];
            $feedback_q2 = $_POST['feedback_q2'];
            $feedback_q3 = $_POST['feedback_q3'];
            $feedback_q4 = $_POST['feedback_q4'];
            $feedback_q5 = $_POST['feedback_q5'];
            $feedback_q6 = $_POST['feedback_q6'];
            $feedback_q7 = $_POST['feedback_q7'];
            $feedback_q8 = $_POST['feedback_q8'];
            $feedback_q9 = $_POST['feedback_q9'];
            $feedback_q10 = $_POST['feedback_q10'];
            $feedback_q11 = $_POST['feedback_q11'];
            $feedback_q12 = $_POST['feedback_q12'];
            $feedback_q13 = $_POST['feedback_q13'];
            $feedback_q14 = $_POST['feedback_q14'];
            $feedback_q15 = $_POST['feedback_q15'];
            $feedback_q16 = $_POST['feedback_q16'];
            $feedback_q17 = $_POST['feedback_q17'];
            $feedback_q18 = $_POST['feedback_q18'];
            $feedback_commond = $_POST['feedback_commond'];
    
            $sql="INSERT INTO `feedback` (`feedback_q1`, `feedback_q2`, `feedback_q3`, `feedback_q4`, `feedback_q5`, `feedback_q6`, `feedback_q7`, `feedback_q8`, `feedback_q9`, `feedback_q10`, `feedback_q11`, `feedback_q12`, `feedback_q13`, `feedback_q14`, `feedback_q15`, `feedback_q16`, `feedback_q17`, `feedback_q18`, `feedback_commond`, `survey_id`) VALUES('$feedback_q1','$feedback_q2','$feedback_q3','$feedback_q4','$feedback_q5','$feedback_q6','$feedback_q7','$feedback_q8','$feedback_q9','$feedback_q10','$feedback_q11','$feedback_q12','$feedback_q13','$feedback_q14','$feedback_q15','$feedback_q16','$feedback_q17','$feedback_q18','$feedback_commond','$survey_id')";
            if(mysqli_query($con,$sql)){
                $message ="<h4 class='text-success' >New record created successfully</h4>";
                echo "$message";
            }else{
                echo "Error :-".$sql.
              "<br>"  .mysqli_error($con);
            }
           $uname= $_SESSION["user_name"];
            $sql2="INSERT into feedback_done (survey_id,student_id,s_date,s_time) values ($survey_id,'$uname',curdate(),curtime())";
            if(mysqli_query($con,$sql2)){
                // $message ="<h4 class='text-success' >New record created successfully</h4>";
                // echo "$message";
            }else{
                echo "Error :-".$sql2.
              "<br>"  .mysqli_error($con);
            }
        }

    }



    ?>

     <!-- ,`staff_name`,`course_name`,`module_name`,`survey_id`,'$staff_name','$course_name','$module_name','$survey_id' -->
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->