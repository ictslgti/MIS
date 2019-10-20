<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<?php
include_once("config.php");
if(isset($_GET['delete'])){
    $event_id = $_GET['delete'];
    $sql = "DELETE FROM `notice_event` WHERE `event_id`=$event_id";
    if(mysqli_query($con,$sql)){
        echo "recorded deleted successufully";
    }else{ echo "error deleting record:" . mysqli_error($conn);}
   
}
?>

<div class=" mr-5 ml-5 mt-5 mb-5">
            <div class="card  shadow  p-3 mb-5 bg-white rounded border-primary">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                        <h2 class="display-5 text-center text-primary"> Event  info list</h2>
                        </div>
                    </div> 
                </div>
            </div>
           
                <div class="row">
                    <div class="col-sm-12">
                   
                        <div class="card border-secondary ">
                                <!-- <h3 class="card-header display-5 text-center text-secondary">   Department of Infromation & communication Techonology</h3> -->
                                <div class="card-body">
                                 
                                  
                                <div class="row border-bottom">
                                    <div class="col-1"><h6>No</h6></div>
                                    <div class="col-2"><h6>Event Name</h6></div>
                                    <div class="col-2"><h6>Venue</h6></div>
                                    <div class="col-3"><h6>Date</h6></div>
                                    <div class="col-2"><h6>Chief Guest</h6></div>
                                    <div class="col-2"><h6>Comment</h6></div>
                                </div>  

                                  <?php 

                                    $sql="SELECT `notice_event`.`event_id` AS `event_id`,
                                    `notice_event`.`event_name` AS `event_name`,
                                    `notice_event`.`event_venue` AS `event_venue` ,
                                    `notice_event`.`event_date` AS `event_date`,
                                    `notice_event`.`event_chief_guest` AS  `event_chief_guest`,
                                    `notice_event`.`event_comment` AS  `event_comment`
                                    from `notice_event`"; 
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                
                                while($row = mysqli_fetch_assoc($result)) {
                                
                                 echo '
                                <div class="row border-bottom">
                                    <div class="col-1">' . $row["event_id"]. ' </div>
                                    <div class="col-2">' . $row["event_name"]. '</div>
                                    <div class="col-3">' . $row["event_venue"]. '</div>
                                    <div class="col-2">' . $row["event_date"]. '</div>
                                    <div class="col-2">' . $row["event_chief_guest"]. '</div>
                                    <div class="col-2">' . $row["event_comment"]. '</div>
                                </div> 

                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-3"> 
                                        | <a href="NoticeEventView.php?id='. $row["event_id"].'" class="text-success"> View</a> | 
                                        <a href="NoticeEventUpload.php?delete='. $row["event_id"].'"> Edit </a> </td> |
                                        <a href="?delete='. $row["event_id"].'"> Delete </a> </td> |
                                    </div>
                                </div> 
                                ';
                                }
                                } else {
                                echo "0 results";
                                }
                                ?>  
                               
                                </div>  
                        </div>   
                    </div>  
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
    var mid = document.getElementById("Module").value;
    var aid = null;
    var tid = null;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Teacher").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getTeacher", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("StaffModuleEnrollment=1&staff_id=" + tid + "&course_id=" + cid+ "&module_id=" + mid+ "&academic_year=" + aid);
}
</script>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->