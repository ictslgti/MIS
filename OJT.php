<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<html>
<body>

<body>
<div class="container">
          <!-- Content here -->
        <div class=row>
        <img src="img/EiWEHj9G6y.jpg" class="img-fluid rounded float-right" alt="Responsive image" style="width:600px; padding-bottom: 30px; padding-top: 30px">
        </div>
</div>

        <div class="container">
        <div class="row">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Name</label>
                        <input type="name" class="form-control" id="exampleInputname" aria-describedby="nameHelp"
                            placeholder="Enter Full name">
                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Student ID</label>
                        <input type="SID" class="form-control" id="exampleInputSID" placeholder="Student ID">
                    </div>

                    <div class="form-group">
                        <label for="DOB">E-mail</label>
                        <input type="password" class="form-control" id="DOB" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="form-group">
                        <label for="PHNO">Phone number</label>
                        <input type="password" class="form-control" id="PHNO" placeholder="phone no">
                    </div>

                    <button type="submit" class="btn btn-primary">Signin</button>
                </form>

            </div>
        </div>


</body>
</html>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->