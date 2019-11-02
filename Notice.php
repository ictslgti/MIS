<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");

?>
<!--END DON'T CHANGE THE ORDER-->

    <div class="row pl-5 pt-5">
       

            <div class="col-md-4 col-sm-12 pl-5 ">
                <a  href="NoticeTimetable.php" style="text-decoration:none">
                    <div class="card text-white bg-primary mb-3 mt-5" style="max-width: 18rem;">
                        <div class="card-header">
                            <div class="row">
                            <div class="col-6" data-toggle="tooltip" data-placement="top" title="Tooltip on top"> <h5>TIMETABLE </h5> </div>
                            <div class="col-3"></div>
                            <div class="col-3"> <h2> <i class="fas fa-edit"></i>  </h2> </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <h6 class="card-title">use submit a form to register your interest at least two months before the exam date.You will be sent an exam entry form and candidate instructions by the end of Month. 
                                         You will also be sent an exam entry form if you are re-sitting the exam.included student and department time table </h6>
                            
                            </div>
                    </div></a>
            </div>
        <div class="col-md-4 col-sm-12 pl-5 ">
        <a  href="NoticeResult.php" style="text-decoration:none">
            <div class="card text-white bg-secondary mb-3 mt-5" style="max-width: 18rem;">
                 <div class="card-header">
                 <div class="row">
                    <div class="col-6"><H3> RESULT</H3></div>
                    <div class="col-3"></div>
                    <div class="col-3"> <h2> <i class="fas fa-user-graduate"></i> </h2> </div>
                            </div>
                        </div>
                 <div class="card-body">
                     <h6 class="card-title">SLGTI is known for providing practice-oriented vocational training programmes at NVQ Level 4, 5 & 6, which contribute to a unique learning experience.
                     Promoting a demand-oriented, SLGTI is supporting the reconciliation process in Sri Lanka.</h6>
                     
                </div>
            </div></a>
        </div>
        <div class="col-md-4 col-sm-12 pl-5 ">
            <div class="card text-white bg-success mb-3 mt-5" style="max-width: 18rem;">
                <div class="card-header"><h3>EVENTS</h3></div>
                
                    <div class="list-group">
                        <form action="NoticeEventView" method="POST">   
                            <input type="submit"  name='evName' value='AwardingCeremony' class="btn btn-success"><br> 
                            <input type="submit"  name='evName' value='Celebration' class="btn btn-success"><br>
                            
                        </form>
                        <form action="" method="POST">   
                        <input type="submit"  name='' value='Visitors Visit' class="btn btn-success"><br> <a href="" ></a>
                        <input type="submit"  name='' value='Volunteer' class="btn btn-success"><br><a href="" ></a>
                        <input type="submit"  name='' value='Other Events' class="btn btn-success"><a href="" ></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    </div>



       
<!--BLOCK#2 START YOUR CODE HERE -->

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->