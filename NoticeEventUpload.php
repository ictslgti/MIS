<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");

?>

<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<form method="POST">

        <div class="row border border-light shadow p-3 mb-5 bg-white rounded">
                <div class="col">
                <br>
                <br>
                <blockquote class="blockquote text-center">
                    <h1 class="display-4">ADD EVENT</h1> 
                    <p class="mb-0">Srilanka German Training Institute</p>
                    <footer class="blockquote-footer">Event Description<cite title="Source Title"></cite></footer>
                </blockquote>
                </div>
        </div>




        <a href="NoticeTable.php">View</a>
        <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"> 
                <i class="fas fa-award"></i> </i>&nbsp;&nbsp;Event Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
            <input type="text" class="form-control"  name="event_name" placeholder="Event Name" >
        </div>

        <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"> 
                <i class="fas fa-map-marker-alt"></i>  </i>&nbsp;&nbsp;Venue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
            <input type="text" class="form-control"  name="event_venue" placeholder="Venue" >
        </div>

        <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"> 
                <i class="far fa-calendar-alt"></i></i>&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
            <input type="date" class="form-control" name="event_date" >
        </div>

        <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"> 
                    <i class="fas fa-user"> </i>&nbsp;&nbsp;cheif Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
            <input type="text" class="form-control"  name="event_chief_guest" placeholder="cheif Guest" >
        </div>


        <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"> 
                <i class="fab fa-audible"></i> </i>&nbsp;&nbsp;Comment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
            <input type="text" class="form-control"  name="event_comment" placeholder="Comment" >
            <!-- <textarea class="form-control"   placeholder="event_comment" name="event_comment" value=""></textarea> -->
        </div>

    
    <!-- <div class="input-group mb-3 ">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"> 
            <i class="fas fa-plus"></i>  </i>&nbsp;&nbsp;Add File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>
         <input class="form-control" type="file" name="file" required/></td>
      
    </div> -->

    <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <input type="submit"  value="ADD" name="add" class="btn btn-outline-primary">
            </div>
            <div class="input-group-prepend"> 
              
            </div>
            
        </div>
    
</form>


<?php
if(isset($_POST['add'])){
     if(!empty($_POST['event_name'])&&
      !empty($_POST['event_venue'])&&
       !empty($_POST['event_date'])&& 
       !empty($_POST['event_chief_guest'])&& 
       !empty($_POST['event_comment'])){
        $event_name=$_POST['event_name'];
        $event_venue=$_POST['event_venue'];
        $event_date=$_POST['event_date'];
        $event_chief_guest=$_POST['event_chief_guest'];
        $event_comment=$_POST['event_comment'];
        $sql="INSERT INTO `notice_event` (`event_name`,`event_venue`,`event_date`,`event_chief_guest`,`event_comment`) values('$event_name','$event_venue','$event_date','$event_chief_guest','$event_comment')";
        if(mysqli_query($con,$sql)){
            $message ="New record created successfully";
            echo "<script type='text/javascript'> alert('$message');</script>";
        }else{
            echo "Error :-".$sql.
          "<br>"  .mysqli_error($con);
        }
    }
}
?>

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
