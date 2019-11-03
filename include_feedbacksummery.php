
                    <div class="row ">
                    <div class="col">
                    <!-- <p>  Thanks you for participating in our survery about educational quality at SLGTI . The infromation you provide 
                        will enable us to asscess current quality and identify measures required to improve educational quality at 
                        SLGTI. Infromation provided is confidential and will be used solely within the framework of this survey 
                        We will not disclose your personal infromation to third parties except in respose to legal requirment. </p> -->
                    </div>
                    </div>



                    <div class="row ">
                    <div class="col">  
                        <div class="text-success" > 5 = "Strongly agree " </div>
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

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                    $s_id= $f_q1a=null;
                                        if(isset($_GET['id'])){
                                            $s_id=$_GET['id'];
                                            $sql="select count(feedback_q1) as feedback_q1  from feedback where  feedback_q1=1 and survey_id=$s_id"; 
                                        }
                                            $result = mysqli_query($con,$sql);
                                        if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                                $f_q1a=$row["feedback_q1"];                                            
                                            }
                                    ?>
                                        <label class="text-info" >1 | T_Num:&nbsp;<?php echo  $f_q1a; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q1b=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q1) as feedback_q1  from feedback where  feedback_q1=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                                $f_q1b=$row["feedback_q1"];                                            
                                                }
                                   ?>
                                    <label class="text-info" >2 | T_Num: &nbsp; <?php echo  $f_q1b; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q1c=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q1) as feedback_q1  from feedback where  feedback_q1=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                                $f_q1c=$row["feedback_q1"];                                            
                                                }
                                   ?>
                                    <label class="text-info" >3 | T_Num:&nbsp;<?php echo  $f_q1c; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q1d=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q1) as feedback_q1  from feedback where  feedback_q1=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                                $f_q1d=$row["feedback_q1"];                                            
                                                }
                                   ?>
                                          <label class="text-info" >4 | T_Num:&nbsp;<?php echo  $f_q1d; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q1e=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q1) as feedback_q1  from feedback where  feedback_q1=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                                $f_q1e=$row["feedback_q1"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:&nbsp;<?php echo  $f_q1e; ?></label>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                        $s_id=$avg=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                               $sql="SELECT count(survey_id) as survey_id from feedback where survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                               $avg=$row["survey_id"];

                                                }
                                                
                                      $TotalCount = ( $f_q1a *1 + $f_q1b *2 + $f_q1c*3 + $f_q1d *4 + $f_q1e *5 )/$avg;
                                    ?>
                                       <label class="text-success" data-toggle="tooltip" data-placement="top" title="Average" > <?php echo  $TotalCount; ?> %</label>
                                </div>
                            </div>
                        
                        </div>

                        <div class="row border-bottom  mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The facilities provided enable effective learning
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                    $s_id= $f_q2f=null;
                                        if(isset($_GET['id'])){
                                            $s_id=$_GET['id'];
                                            $sql="select count(feedback_q2) as feedback_q2  from feedback where  feedback_q2=1 and survey_id=$s_id"; 
                                        }
                                            $result = mysqli_query($con,$sql);
                                        if (mysqli_num_rows($result) == 1) {
                                                $row=mysqli_fetch_assoc($result);
                                                $f_q2f=$row["feedback_q2"];                                            
                                            }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q2f; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q2g=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q2) as feedback_q2  from feedback where  feedback_q2=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q2g=$row["feedback_q2"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q2g; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q2h=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q2) as feedback_q2  from feedback where  feedback_q2=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q2h=$row["feedback_q2"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q2h; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q2i=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q2) as feedback_q2  from feedback where  feedback_q2=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q2i=$row["feedback_q2"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q2i; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q2j=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q2) as feedback_q2  from feedback where  feedback_q2=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q2j=$row["feedback_q2"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q2j; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount1 = ( $f_q2f *1 + $f_q2g *2 + $f_q2h*3 + $f_q2i *4 + $f_q2j *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount1; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4">
                            <div class="col-md-6 col-sm-12">
                            The concept of the module and its content provide a perfect balance of theoretical and practical content
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q3k=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q3) as feedback_q3  from feedback where  feedback_q3=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q3k=$row["feedback_q3"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q3k; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q3l=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q3) as feedback_q3  from feedback where  feedback_q3=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q3l=$row["feedback_q3"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q3l; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q3m=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q3) as feedback_q3  from feedback where  feedback_q3=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q3m=$row["feedback_q3"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q3m; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q3n=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q3) as feedback_q3  from feedback where  feedback_q3=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q3n=$row["feedback_q3"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q3n; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q3o=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q3) as feedback_q3  from feedback where  feedback_q3=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q3o=$row["feedback_q3"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q3o; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount2 = ( $f_q3k *1 + $f_q3l *2 + $f_q3m*3 + $f_q3n *4 + $f_q3o *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount2; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4" >
                            <div class="col-md-6 col-sm-12">
                            The module content provides an high level of difficulty
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q4p=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q4) as feedback_q4  from feedback where  feedback_q4=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q4p=$row["feedback_q4"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q4p; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q4q=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q4) as feedback_q4  from feedback where  feedback_q4=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q4q=$row["feedback_q4"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q4q; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q4r=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q4) as feedback_q4  from feedback where  feedback_q4=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q4r=$row["feedback_q4"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q4r; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q4s=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q4) as feedback_q4  from feedback where  feedback_q4=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q4s=$row["feedback_q4"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q4s; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q4t=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q4) as feedback_q4  from feedback where  feedback_q4=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q4t=$row["feedback_q4"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q4t; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount3 = ( $f_q4p *1 + $f_q4q *2 + $f_q4r*3 + $f_q4s *4 + $f_q4t *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount3; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The module content provides practical applicability
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q5u=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q5) as feedback_q5  from feedback where  feedback_q5=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q5u=$row["feedback_q5"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q5u; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q5x=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q5) as feedback_q5  from feedback where  feedback_q5=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q5x=$row["feedback_q5"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q5x; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q5y=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q5) as feedback_q5  from feedback where  feedback_q5=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q5y=$row["feedback_q5"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q5y; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q5z=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q5) as feedback_q5  from feedback where  feedback_q5=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q5z=$row["feedback_q5"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q5z; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q5aa=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q5) as feedback_q5  from feedback where  feedback_q5=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q5aa=$row["feedback_q5"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q5aa; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount4 = ( $f_q5u *1 + $f_q5x *2 + $f_q5y*3 + $f_q5z *4 + $f_q5aa *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount4; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4">
                            <div class="col-md-6 col-sm-12">
                            The module / course material help me understand the lesson <br> (script , hand-out , etc)
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q6ab=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q6) as feedback_q6  from feedback where  feedback_q6=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q6ab=$row["feedback_q6"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q6ab; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q6ac=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q6) as feedback_q6  from feedback where  feedback_q6=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q6ac=$row["feedback_q6"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q6ac; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q6ad=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q6) as feedback_q6  from feedback where  feedback_q6=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q6ad=$row["feedback_q6"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q6ad; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q6ae=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q6) as feedback_q6  from feedback where  feedback_q6=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q6ae=$row["feedback_q6"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q6ae; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q6af=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q6) as feedback_q6  from feedback where  feedback_q6=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q6af=$row["feedback_q6"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q6af; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount5 = ( $f_q6ab *1 + $f_q6ac *2 + $f_q6ad*3 + $f_q6ae *4 + $f_q6af *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount5; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Thee workload of the module is reasonable
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q7ag=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q7) as feedback_q7  from feedback where  feedback_q7=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q7ag=$row["feedback_q7"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q7ag; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q7ah=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q7) as feedback_q7  from feedback where  feedback_q7=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q7ah=$row["feedback_q7"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q7ah; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q7ai=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q7) as feedback_q7  from feedback where  feedback_q7=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q7ai=$row["feedback_q7"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q7ai; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q7aj=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q7) as feedback_q7  from feedback where  feedback_q7=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q7aj=$row["feedback_q7"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q7aj; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q7ak=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q7) as feedback_q7  from feedback where  feedback_q7=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q7ak=$row["feedback_q7"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q7ak; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount6 = ( $f_q7ag *1 + $f_q7ah *2 + $f_q7ai*3 + $f_q7aj *4 + $f_q7ak *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount6; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Internet access is provided to encourage e-learning
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q8al=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q8) as feedback_q8  from feedback where  feedback_q8=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q8al=$row["feedback_q8"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q8al; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q8am=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q8) as feedback_q8  from feedback where  feedback_q8=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q8am=$row["feedback_q8"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q8am; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q8an=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q8) as feedback_q8  from feedback where  feedback_q8=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q8an=$row["feedback_q8"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q8an; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q8ao=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q8) as feedback_q8  from feedback where  feedback_q8=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q8ao=$row["feedback_q8"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q8ao; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q8ap=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q8) as feedback_q8  from feedback where  feedback_q8=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q8ap=$row["feedback_q8"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q8ap; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount7 = ( $f_q8al *1 + $f_q8am *2 + $f_q8an*3 + $f_q8ao *4 + $f_q8ap *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount7; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Overall , I am satisfied with this module
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q9aq=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q9) as feedback_q9  from feedback where  feedback_q9=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q9aq=$row["feedback_q9"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q9aq; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q9ar=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q9) as feedback_q9  from feedback where  feedback_q9=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q9ar=$row["feedback_q9"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q9ar; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q9as=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q9) as feedback_q9  from feedback where  feedback_q9=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q9as=$row["feedback_q9"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q9as; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q9at=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q9) as feedback_q9  from feedback where  feedback_q9=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q9at=$row["feedback_q9"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q9at; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q9au=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q9) as feedback_q9  from feedback where  feedback_q9=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q9au=$row["feedback_q9"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q9au; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount8 = ( $f_q9aq *1 + $f_q9ar *2 + $f_q9as*3 + $f_q9at *4 + $f_q9au *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount8; ?> %</label>
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

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q10ax=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q10) as feedback_q10  from feedback where  feedback_q10=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q10ax=$row["feedback_q10"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q10ax; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q10ay=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q10) as feedback_q10  from feedback where  feedback_q10=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q10ay=$row["feedback_q10"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q10ay; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q10az=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q10) as feedback_q10  from feedback where  feedback_q10=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q10az=$row["feedback_q10"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q10az; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q10ba=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q10) as feedback_q10  from feedback where  feedback_q10=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q10ba=$row["feedback_q10"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q10ba; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q10bb=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q10) as feedback_q10  from feedback where  feedback_q10=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q10bb=$row["feedback_q10"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q10bb; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount9 = ( $f_q10ax *1 + $f_q10ay *2 + $f_q10az*3 + $f_q10ba *4 + $f_q10bb *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount9; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom  mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher is knowledgeable in the subject area
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q11bc=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q11) as feedback_q11  from feedback where  feedback_q11=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q11bc=$row["feedback_q11"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q11bc; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q11bd=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q11) as feedback_q11  from feedback where  feedback_q11=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q11bd=$row["feedback_q11"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q11bd; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q11be=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q11) as feedback_q11  from feedback where  feedback_q11=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q11be=$row["feedback_q11"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q11be; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q11bf=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q11) as feedback_q11  from feedback where  feedback_q11=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q11bf=$row["feedback_q11"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q11bf; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q11bg=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q11) as feedback_q11  from feedback where  feedback_q11=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q11bg=$row["feedback_q11"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q11bg; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount10 = ( $f_q11bc *1 + $f_q11bd *2 + $f_q11be*3 + $f_q11bf *4 + $f_q11bg *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount10; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher is well prepared and organized for class
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q12bh=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q12) as feedback_q12  from feedback where  feedback_q12=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q12bh=$row["feedback_q12"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q12bh; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q12bi=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q12) as feedback_q12  from feedback where  feedback_q12=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q12bi=$row["feedback_q12"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q12bi; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q12bj=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q12) as feedback_q12  from feedback where  feedback_q12=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q12bj=$row["feedback_q12"];                                            
                                                }
                                    ?>    
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q12bj; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q1bk=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q12) as feedback_q12  from feedback where  feedback_q12=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q12bk=$row["feedback_q12"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q12bk; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q12bl=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q12) as feedback_q12  from feedback where  feedback_q12=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q12bl=$row["feedback_q12"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q12bl; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount11 = ( $f_q12bh *1 + $f_q12bi *2 + $f_q12bj*3 + $f_q12bk *4 + $f_q12bl *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount11; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher is enthusiastic about teaching the course and stimulates student interest
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q13bm=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q13) as feedback_q13  from feedback where  feedback_q13=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q13bm=$row["feedback_q13"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q13bm; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q13bn=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q13) as feedback_q13  from feedback where  feedback_q13=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q13bn=$row["feedback_q13"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q13bn; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q13bo=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q13) as feedback_q13  from feedback where  feedback_q13=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q13bo=$row["feedback_q13"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q13bo; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q13bp=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q13) as feedback_q13  from feedback where  feedback_q13=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q13bp=$row["feedback_q13"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q13bp; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q13bq=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q13) as feedback_q13  from feedback where  feedback_q13=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q13bq=$row["feedback_q13"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q13bq; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount12 = ( $f_q13bm *1 + $f_q13bn *2 + $f_q13bo*3 + $f_q13bp *4 + $f_q13bq *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount12; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The teacher uses a variety of teaching methods (discussion , group work , <br> presentation , practical examples , etc.) during class time , and makes the  <br> lesson interesting
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q14br=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q14) as feedback_q14  from feedback where  feedback_q14=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q14br=$row["feedback_q14"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q14br; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q14bs=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q14) as feedback_q14  from feedback where  feedback_q14=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q14bs=$row["feedback_q14"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q14bs; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q14bt=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q14) as feedback_q14  from feedback where  feedback_q14=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q14bt=$row["feedback_q14"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q14bt; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q14bu=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q14) as feedback_q14  from feedback where  feedback_q14=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q14bu=$row["feedback_q14"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q14bu; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q14bx=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q14) as feedback_q14  from feedback where  feedback_q14=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q14bx=$row["feedback_q14"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q14bx; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount13 = ( $f_q14br *1 + $f_q14bs *2 + $f_q14bt*3 + $f_q14bu *4 + $f_q14bx *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount13; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            The module / course material help me understand the lesson <br> (script , hand-out , etc)
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q15by=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q15) as feedback_q15  from feedback where  feedback_q15=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q15by=$row["feedback_q15"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q15by; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q15bz=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q15) as feedback_q15  from feedback where  feedback_q15=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q15bz=$row["feedback_q15"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q15bz; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q15aaa=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q15) as feedback_q15  from feedback where  feedback_q15=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q15aaa=$row["feedback_q15"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q15aaa; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q15aab=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q15) as feedback_q15  from feedback where  feedback_q15=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q15aab=$row["feedback_q15"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q15aab; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q15aac=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q15) as feedback_q15  from feedback where  feedback_q15=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q15aac=$row["feedback_q15"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q15aac; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount14 = ( $f_q15by *1 + $f_q15bz *2 + $f_q15aaa*3 + $f_q15aab *4 + $f_q15aac *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount14; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Thee workload of the module is reasonable
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q16aad=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q16) as feedback_q16  from feedback where  feedback_q16=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q16aad=$row["feedback_q16"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q16aad; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q16aae=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q16) as feedback_q16  from feedback where  feedback_q16=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q16aae=$row["feedback_q16"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q16aae; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q16aaf=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q16) as feedback_q16  from feedback where  feedback_q16=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q16aaf=$row["feedback_q16"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q16aaf; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q16aag=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q16) as feedback_q16  from feedback where  feedback_q16=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q16aag=$row["feedback_q16"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q16aag; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q16aah=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q16) as feedback_q16  from feedback where  feedback_q16=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q16aah=$row["feedback_q16"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q16aah; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount15 = ( $f_q16aad *1 + $f_q16aae *2 + $f_q16aaf*3 + $f_q16aag *4 + $f_q16aah *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount15; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4">
                            <div class="col-md-6 col-sm-12">
                            Internet access is provided to encourage e-learning
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q17a=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q17) as feedback_q17  from feedback where  feedback_q17=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q17a=$row["feedback_q17"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q17a; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q17b=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q17) as feedback_q17  from feedback where  feedback_q17=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q17b=$row["feedback_q17"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q17b; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q17c=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q17) as feedback_q17  from feedback where  feedback_q17=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q17c=$row["feedback_q17"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q17c; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q17d=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q17) as feedback_q17  from feedback where  feedback_q17=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q17d=$row["feedback_q17"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q17d; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q17e=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q17) as feedback_q17  from feedback where  feedback_q17=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q17e=$row["feedback_q17"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q17e; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                              
                                    $TotalCount16= ( $f_q17a *1 + $f_q17b *2 + $f_q17c*3 + $f_q17d *4 + $f_q17e *5 )/ $avg;
                              
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount16; ?> %</label>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                            Overall , I am satisfied with this module
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q18a=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q18) as feedback_q18  from feedback where  feedback_q18=1 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q18a=$row["feedback_q18"];                                            
                                                }
                                    ?>
                                        <label class="text-info" >1 | T_Num:<?php echo  $f_q18a; ?></label>

                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q18b=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q18) as feedback_q18  from feedback where  feedback_q18=2 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q18b=$row["feedback_q18"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >2 | T_Num:<?php echo  $f_q18b; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q18c=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q18) as feedback_q18  from feedback where  feedback_q18=3 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q18c=$row["feedback_q18"];                                            
                                                }
                                    ?>
                                    <label class="text-info" >3 | T_Num:<?php echo  $f_q18c; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q18d=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q18) as feedback_q18  from feedback where  feedback_q18=4 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q18d=$row["feedback_q18"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >4 | T_Num:<?php echo  $f_q18d; ?></label>
                                </div>

                                <div class="custom-control-inline">
                                    <?php
                                        $s_id= $f_q18e=null;
                                            if(isset($_GET['id'])){
                                                $s_id=$_GET['id'];
                                                $sql="select count(feedback_q18) as feedback_q18  from feedback where  feedback_q18=5 and survey_id=$s_id"; 
                                            }
                                                $result = mysqli_query($con,$sql);
                                            if (mysqli_num_rows($result) == 1) {
                                                    $row=mysqli_fetch_assoc($result);
                                                    $f_q18e=$row["feedback_q18"];                                            
                                                }
                                    ?>
                                          <label class="text-info" >5 | T_Num:<?php echo  $f_q18e; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="custom-control-inline">
                                <?php
                                $TotalCount17 = ( $f_q18a *1 + $f_q18b *2 + $f_q18c*3 + $f_q18d *4 + $f_q18e *5 )/ $avg;
                                ?>
                                       <label class="text-success" > <?php echo  $TotalCount17; ?> %</label>
                                </div>
                            </div>
                        </div>



                        <div class="row border-bottom mb-4 ">
                            <div class="col-md-6 col-sm-12">
                           
                            </div>

                            <div class="col-md-4 col-sm-12">
                             <h3 class="text-danger">OVERALL STUDENTS' RATING </h3>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <?php
                                $RATING= ($TotalCount + $TotalCount1 +$TotalCount2 +$TotalCount3 +$TotalCount4 +$TotalCount5 +$TotalCount6 +$TotalCount7 +$TotalCount8 +$TotalCount9 +$TotalCount10 +$TotalCount11 +$TotalCount12 +$TotalCount13 +$TotalCount14 +$TotalCount15 +$TotalCount16 +$TotalCount17) /18;
                                ?>
                                <label class="text-danger" > <?php echo  $RATING; ?> %</label>
                            </div>
                        </div>
            </div>
    </div>             
</form>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>