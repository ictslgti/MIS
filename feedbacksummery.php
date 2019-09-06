<!--START Don't CHANGE THE ORDER-->
<?php 
 $title ="Feedbacksummary | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
?>                     
 <!--END Don't CHANGE THE ORDER-->

<!--START YOUR CODER HERE-->


<div class="container" style="margin-top:5%">
    
    <div  class="row" style="border: 2px solid #37b6ff  ;padding:20px; border-bottom-right-radius: 20px ;border-bottom-left-radius: 20px ;">
    <div class="col" style="background-color:#37b6ff ">
        <h1 style="text-align:center">Feedback Menu</h1>
    </div>


  <div class="row">

        <div class="col">
            <div class="form-group">
                <label>Department</label>
                <select class="browser-default custom-select">
                <option selected>Open this select menu</option>
                <option value="1">Automobile & Agricultual </option>
                <option value="2">Constrution</option>
                <option value="3">Electrical & Electronic</option>
                <option value="4">Food </option>
                <option value="5">Mechanical Technology</option>
                <option value="6">Information & Communication </option>
                </select>
            </div>

        </div>

        <div class="col">
            <div class="form-group">
                <label>Academin Year</label>
                <select class="browser-default custom-select">
                <option selected>Open this select menu</option>
                <option value="1">2018/2019</option>
                <option value="2">2019/2020</option>
          
                </select>
            </div>
                                            
        </div>                                     

        <div class="w-100"></div>

        <div class="col">
            <div class="form-group">
                <label>Course</label>
                <select class="browser-default custom-select">
                <option selected>Open this select menu</option>
                <option value="1">Automobile & Agricultual Technology</option>
                <option value="2">Constrution Technology</option>
                <option value="3">Electrical & Electronic Technology</option>
                <option value="4">Food Technology</option>
                <option value="5">Mechanical Technology</option>
                <option value="6">Information & Communication Technology</option>
                </select>
            </div>                              
        </div>

        <div class="col">
            <div class="form-group">
                <label>Modules</label>
                <select class="browser-default custom-select">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
            </div>
        </div>

        <div class="w-100"></div>

        <div class="col-6">
            <div class="form-group">
                <label>Staff Name</label>
                <select class="browser-default custom-select">
                <option selected>Open this select menu</option>
                <option value="1">Y.Achchuthan</option>
                <option value="2">G.Romiyal</option>
                <option value="3">M.Rijah</option>
                <option value="4">S.Thapothiny</option>
                </select>
            </div>                              
        </div>

        <div class="w-100"></div>

        <div class="col">
            <div class="form-group">
                <label>Start Date</label>
                <br>
                  <input type="date">
                        
            </div>                              
        </div>

        <div class="col">
            <div class="form-group">
                <label>End Date</label>
                <br>
                  <input type="date">
                        
            </div> 
        </div>


        <div class="w-100"></div>

        <div class="col">
            <div class="form-group">
            <a href="feedback.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">create</a>
           
          
            </div>                              
        </div>
        
    </div>
</div>
</div>


       

<!--END OF YOUR CODER-->

<!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
<!--Don't CHANGE THE ORDER-->