<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");

$eid =$e_name = $e_venue = $e_date = $e_cguest = $e_comm=null;
 if(isset($_GET['id'])){
     $eid=$_GET['id'];
     $sql="SELECT * FROM `notice_event` WHERE  `event_id`= $eid";
     $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result) == 1) {
         $row=mysqli_fetch_assoc($result);
         $e_name=$row['event_name'];
         $e_venue=$row['event_venue'];
         $e_date=$row['event_date'];
         $e_cguest=$row['event_chief_guest'];
         $e_comm=$row['event_comment'];
     }
 }

?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->


<?php
$eid =$e_name = $e_venue = $e_date = $e_cguest = $e_comm=null;
 if(isset($_POST["evName"])){
    $eid=$_POST["evName"];
    $sql="SELECT * from `notice_event` e,`notice_event_stutas` s  WHERE e.status=s.id and event_date >= curdate() and s.`status`='$eid'";
    $result = mysqli_query($con,$sql);
   if (mysqli_num_rows($result) == 1) {
        $row=mysqli_fetch_assoc($result);
        $e_name=$row['event_name'];
        $e_venue=$row['event_venue'];
        $e_date=$row['event_date'];
        $e_cguest=$row['event_chief_guest'];
        $e_comm=$row['event_comment'];
    }
}

?>


<form method ="post"  action="NoticeEventUpload">
        <div class="row border border-light shadow p-3 mb-5 bg-white rounded">
            <div class="col">
            <br>
            <br>
                <blockquote class="blockquote text-center">
                    <h1 class="display-4">View EVENT</h1> 
                    <p class="mb-0">Srilanka German Training Institute</p>
                    <footer class="blockquote-footer">Event Description<cite title="Source Title"></cite></footer>
                </blockquote>
            </div>
        </div>



<div class="row">
    <div class="col-3" >
      1 of 3
    </div>
    <div class="col-6">

    <div class="row">
    <div class="col-12">

        <div class="mr-5 ml-5 mt-5 mb-5">

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> 
                    <i class="fas fa-award"></i> </i>&nbsp;&nbsp;Event Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <input type="text" class="form-control" id="inputPassword2" name="event_name" placeholder="Event Name" value="<?php echo $e_name;?>" readonly="readonly">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> 
                    <i class="fas fa-map-marker-alt"></i>  </i>&nbsp;&nbsp;Venue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <input type="text" class="form-control" id="inputPassword2" placeholder="Venue" name="event_venue"  value="<?php echo $e_venue;?>" readonly="readonly">
            </div>

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> 
                    <i class="far fa-calendar-alt"></i></i>&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <input type="date" class="form-control" id="inputPassword2" name="event_date" value="<?php echo $e_date;?>" readonly="readonly">
            </div>

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> 
                        <i class="fas fa-user"> </i>&nbsp;&nbsp;cheif Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <input type="text" class="form-control" id="inputPassword2" name="event_chief_guest" placeholder="cheif Guest" value="<?php echo $e_cguest;?>" readonly="readonly">
            </div>


            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> 
                    <i class="fab fa-audible"></i> </i>&nbsp;&nbsp;Comment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <input type="text" class="form-control"  name="event_comment" placeholder="" value="<?php echo $e_comm; ?>" readonly="readonly">
              
            </div>

    </div>
    </div>
</div>
    </div>
    <div class="col-3">

    <?php
if(isset($_POST["evName"])){
    $eid=$_POST["evName"];
    $sql="SELECT * from `notice_event` e,`notice_event_stutas` s  WHERE e.status=s.id and event_date >= curdate() and s.`status`='$eid'";
    $result = mysqli_query($con,$sql);
   if (mysqli_num_rows($result) == 1) {
        $row=mysqli_fetch_assoc($result);
        $file_name=$row['file_name'];
    }
} 
echo "<div>";
    echo "<a href='img/doc/event/".$row['file_name']."' target='NoticeEventView'> click here </a>";
echo "</div>";



       
    ?>


     
    
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
