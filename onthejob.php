<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "ojt | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


          <!-- Content here -->
        

          <div class="row">
          <div class="col">
          <h1>Student Placement Request</h1>
          <br>
          <br>
          </div>
          </div>
        
        <div class="row">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="stuname">Student Name</label>
                        <input type="name" class="form-control" id="stuname" aria-describedby="nameHelp"
                            placeholder="Enter Full name">
                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputSID">Student ID</label>
                        <input type="SID" class="form-control" id="exampleInputSID" placeholder="Enter your Student ID">
                    </div>

                    <div class="form-group">
                        <label for="deptname">Department Name</label>
                        <input type="SID" class="form-control" id="deptname" placeholder="Enter your Department">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="enter E-mail">
                    </div>

                    <div class="form-group">
                        <label for="Rplace">Request Place</label>
                        <input type="Rplace" class="form-control" id="Rplace" placeholder="ABC Company">
                    </div>

                    <div class="form-group">
                        <label for="add">Address</label>
                        <input type="add" class="form-control" id="add" placeholder="No-7,Green Road, Colombo-07">
                    </div>

                    <div class="form-group">
                        <label for="com">Comments</label>
                        <input type="com" class="form-control" id="com" placeholder="Write your any other comments">
                    </div>

                    <button type="submit" class="btn btn-primary">Requesting...</button>
                </form>

            </div>
        </div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->