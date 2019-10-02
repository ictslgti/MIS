 <!--START Don't CHANGE THE ORDER-->
 <?php 
$title ="Home | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
 ?>
 <!--END Don't CHANGE THE ORDER-->

 <!--START YOUR CODER HERE-->
 <div class=row>
        <div class="col">
          <br>
          <br>
          <h1>Find your Training Place</h1>
          <br>
          <br>
          </div>
          </div>
        <div class=row>
        <div class="col">
        <form>
                    <div class="form-group">
                        <label for="stuid">Student ID</label>
                        <input type="id" class="form-control" id="stuid" aria-describedby="nameHelp" placeholder="Enter your student ID"> 
                    </div>
                    <br>
                    <button type="button" class="btn btn-outline-info">Find Us</button>
                    <br>
                    <br>
                    <h4>Your Training Place</h4>
                    <br>
                    <div class="form-group">
                        <label for="stuname">Student Name</label>
                        <input type="name" class="form-control" id="stuname" aria-describedby="nameHelp">  
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Department</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option></option>
                    <option>Information & Communication Technology</option>
                    <option>Food Technology</option>
                    <option>Automotive Technology</option>
                    <option>Electrical & Electronics</option>
                    <option>Mechanical</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="Rplace">Your Training Place</label>
                        <input type="Rplace" class="form-control" id="Rplace" >
                    </div>

                    <p> This is your final Traing Place. Approved by Student affair's, SLGTI.</p>
                    <br>
                    <button type="button" class="btn btn-outline-success">Okay</button>
                   
                        
</form>
</div>


    

<!--END OF YOUR CODER-->

  <!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
 <!--Don't CHANGE THE ORDER-->