<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->





<form method ="post"  action="NoticeEventUpload">
        <div class="row border border-light shadow  bg-white rounded">
            <div class="col">
            
                <blockquote class="blockquote text-center">
                    <h1 class="display-4 text-primary">View EVENT</h1> 
                    <p class="">Srilanka German Training Institute</p>
                    <footer class="blockquote-footer">This section to view.<cite title="Source Title"></cite></footer>
                </blockquote>
            </div>
        </div>
        <br><br>
        
            <?php  
            if(isset($_POST["evName"])){
                $eid=$_POST["evName"];
                $sql="SELECT * from `notice_event` e,`notice_event_stutas` s  WHERE e.status=s.id and s.`status`='$eid' order by event_date > curdate() desc";
                $result = mysqli_query($con,$sql);
               if (mysqli_num_rows($result)>0) {
                    while($row=mysqli_fetch_assoc($result)){
                    $e_name=$row['event_name'];
                    $e_venue=$row['event_venue'];
                    $e_date=$row['event_date'];
                    $e_time=$row['event_time'];
                    $e_cguest=$row['event_chief_guest'];
                    $e_comm=$row['event_comment'];
                    $file_name=$row['event_docs_url'];
                    $C_date=date('Y-m-d');
                    if($e_date > $C_date)$mess='<h4  class="text-success">soon<h4>';else $mess='<h4  class="text-danger">closed<h4>';
                    echo '<div class="row">
                    <div class="col-md-4 col-sm-12 border-dark shadow  bg-white rounded">
                <blockquote class="blockquote text-center">
                   
                    <p class="">'
                    .$mess.
                        
                    '</p>
                
                </blockquote>
            </div>
        </div>

<br><br>
<div class="row">

 <div class="col-md-5 col-sm-12">
    
    
       <div>
          
            <img src="docs/events/'.$file_name.'"  class="img-fluid img-thumbnail" alt="Event Image">
        </div> 
    
 </div>

    <div class="col-md-7 col-sm-12">

        <div class="row">
            <div class="col-12"> <h3 class="mb-4 text-danger">Event For:&nbsp;'.$e_name.'</h3></div>
            
            <div class="w-100"></div>
            <div class="col"><h5 class="border-bottom mb-4">  <i class="fas fa-map-marker-alt text-primary"></i>  </i>&nbsp;&nbsp;Venue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></div>
            <div class="col"><h5 class="border-bottom mb-4">' .  $e_venue . '</h5></div>
            <div class="w-100"></div>
            <div class="col"><h5 class="border-bottom mb-4"> <i class="far fa-calendar-alt text-primary"></i></i>&nbsp;&nbsp;Date / Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></div>
            <div class="col"><h5 class="border-bottom mb-4">' .  $e_date .'&nbsp;&nbsp;/&nbsp;&nbsp;' .$e_time. '</h5></div>
            <div class="w-100"></div>
            <div class="col"><h5 class="border-bottom mb-4"> <i class="fas fa-user text-primary"> </i>&nbsp;&nbsp;Cheif Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></div>
            <div class="col"><h5 class="border-bottom mb-4">' .  $e_cguest . '</h5></div>    
            <div class="w-100"></div>
            <div class="col-12"> <h5 class=""><i class="fab fa-audible text-primary"></i> </i>&nbsp;Comment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5><br> 
            <h5 >' .  $e_comm . '</h5></div>
        </div>

       
    </div>

    
</div>
<br><br><br>
<div class="border-bottom"> </div>
<br><br><br>
';


                    }
                }}
?>

</form>

<?php
$eid =$e_name = $e_venue = $e_date = $e_time =$e_cguest = $e_comm= $file_name=null;
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
        $file_name=$row['event_docs_url'];
    }
}

if(isset($_GET['id'])){
    echo '
    <div class="row">

        <div class="col-md-5 col-sm-12">
            <div>
                <img src="docs/events/'.$file_name.'"  class="img-fluid img-thumbnail" alt="Event Image">
            </div>
        </div>
    
        <div class="col-md-7 col-sm-12">
    
            <div class="row">
                <div class="col-12"> <h3 class="mb-4 text-danger">Event For:&nbsp;'.$e_name.'</h3></div>
                
                <div class="w-100"></div>
                <div class="col"><h5 class="border-bottom mb-4">  <i class="fas fa-map-marker-alt text-primary"></i>  </i>&nbsp;&nbsp;Venue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></div>
                <div class="col"><h5 class="border-bottom mb-4">' .  $e_venue . '</h5></div>
                <div class="w-100"></div>
                <div class="col"><h5 class="border-bottom mb-4"> <i class="far fa-calendar-alt text-primary"></i></i>&nbsp;&nbsp;Date / Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></div>
                <div class="col"><h5 class="border-bottom mb-4">' .  $e_date .'&nbsp;&nbsp;/&nbsp;&nbsp;' .$e_time. '</h5></div>
                <div class="w-100"></div>
                <div class="col"><h5 class="border-bottom mb-4"> <i class="fas fa-user text-primary"> </i>&nbsp;&nbsp;Cheif Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></div>
                <div class="col"><h5 class="border-bottom mb-4">' .  $e_cguest . '</h5></div>    
                <div class="w-100"></div>
                <div class="col-12"> <h5 class=""><i class="fab fa-audible text-primary"></i> </i>&nbsp;Comment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5><br> 
                <h5 >' .  $e_comm . '</h5></div>
            </div>
    
           
        </div>
    </div>
    
    ';
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
