<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<br>
<div class="row border border-light shadow p-3 mb-5 bg-white rounded">
          <div class="col">
          <br>
          <br>
            <blockquote class="blockquote text-center">
                <h1 class="display-4">On peak Request</h1> 
                <p class="mb-0">Department of Information and Communication Technology</p>
                <footer class="blockquote-footer">Temporary Exit Application<cite title="Source Title"></cite></footer>
            </blockquote>
          </div>
</div>

<!-- card start here-->

<div class="border border-light shadow p-3 mb-5 bg-white rounded" > 
<br>    
<div class="table container">    
    <div class="container">
        <div class="intro">

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-user"> </i>&nbsp;&nbsp; Full Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" type="text" placeholder="Name with Surname">
        </div>

<br>

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-fingerprint"> </i>&nbsp;&nbsp; Registration No &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" type="text" placeholder="Name with Surname">
        </div>

<br>       

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <i class="fas fa-school"></i>&nbsp;&nbsp;Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Department of Information & Communication Technology </option>
                        <option value="1">Department of Food Technology </option>
                        <option value="1">Department of Mechnical Technology </option>
                        <option value="1">Department of Automobile Technology </option>
                        <option value="1">Department of Construction Technology </option>
                        <option value="1">Department of Electrical Technology </option>
                    </select>
        </div>

<br>

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-phone-alt"> </i>&nbsp;&nbsp; Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" type="text" placeholder="Mobile or Home number">
        </div>

<br>

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Reason for Exit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Hospital </option>
                        <option value="1">Family issues </option>
                        <option value="1">Other Reasons</option>
                    
                    </select>
        </div>

<br>

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="far fa-clock"> </i>&nbsp;&nbsp; Exit Date & Time &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" type="text" placeholder="Exit Date and Time">
        </div>

<br>

        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> 
                            <i class="fas fa-history"> </i>&nbsp;&nbsp; Return Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <input class="form-control" type="text" placeholder="Return Time">
        </div>

<br>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Comments : </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

<br>
        
        <div class=row>
            <div class="col">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">I have read and understand the terms and conditions. I have agreed by the abide by the rules and regulations of SLGTI.</p>
                </blockquote>
            </div>
        </div>

<br>
      
        <div class="row">
            <div class="col">
                <div class="mx-auto" style="width: 200px;">
                    <input class="btn btn-primary" type="submit" value="Request Submit">
                </div>
            </div>
        </div>
       





               
        </div>
    </div>
</div>
</div>


<div class="border border-light shadow p-3 mb-5 bg-white rounded" >
    <div class="col">
        <blockquote class="blockquote text-center">
            <p class="mb-0">Terms and Conditions of SLGTI </p>
            <footer class="blockquote-footer">This request must be approved by the HOD and Warden, when students want to exit SLGTI during school hours/ on peak (8.15 am - 4.15 pm)  <cite title="Source Title"></cite></footer>
            <footer class="blockquote-footer">Please note that you fail with in the jurisdiction of the code of conduct and honor for off-campus conduct. <cite title="Source Title"></cite></footer>
            <footer class="blockquote-footer">Please indicate the reason for your temporary exit in the box above, state the date and seek for approval by your HEAD of the Department (HoD). <cite title="Source Title"></cite></footer>
        </blockquote> 
    </div>
</div>








<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
<script>
function showCouese(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Course").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getCourse", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("department=" + val);
}

function showModule(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Module").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getModule", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("course=" + val);
}

function showTeacher() {
    var did = document.getElementById("Departmentx").value;
    var cid = document.getElementById("Course").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Teacher").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getTeacher", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("Department=" + did + "&Course="+ cid );
}
</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->