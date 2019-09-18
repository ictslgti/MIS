<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<form>
            <div class="row border rounded-lg border-info mr-5 ml-5 mt-5 mb-5">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
                <h2  class="pt-2" style="color:white">Timetable Info</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="category">01. Department</label> <span style="color:red;">*</span></label>
                  
                  <select class="form-control" name="category">
                      <option value="ict">ICT</option>
                      <option value="construction">Construction</option>
                      <option value="mechanical">Mechanical</option>
                      <option value="autoMobile">Auto Mobile</option>
                      <option value="food">Food Tech</option>
                      <option value="electronic">Electronic</option>
                      <option value="common">Common</option>
                    </select>
            </div>
            <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="category">02.Type of Timetable</label> <span style="color:red;">*</span></label>
                  
                  <select class="form-control" name="category">
                      <option value="ict">Exam</option>
                      <option value="construction">Class</option>
                      </select>
                     
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="pubName">03. Level</label> <span style="color:red;">*</span></label>
                  <select class="form-control" name="category">
                      <option value="ict">Level-04</option>
                      <option value="construction">Level-05</option>
                      <option value="construction">Bridging</option></select>
              </div>

              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
              <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
             <button type="submit" class="btn btn-info mt-2 float-right">View</button>
              </div>
          
            </div>
      </form>

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