<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Chat | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->
<body onload="changeTextFD()">
<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>


<?php
$chat_group_member_id= $chat_group_member= $chat_group_id= null;
if(isset($_GET['Yes'])){
  
$username=$_SESSION['user_name'];


$sql="INSERT INTO `chat_group_member`( `chat_group_member`,`chat_group_id`)
VALUES ('$username','4')";
 if(mysqli_query($con,$sql)){


}

}
else{
echo "Error".$sql."<br>".mysqli_error($con);
}

?>


<div class="row">
<div class="col-7">



<div class="card-body p-4 mb-2 bg-primary text-white rounded">
                <h5 class=" border-white pb-2 mb-0">Messages</h5><i class="fas fa-exclamation-circle float-right" >&nbsp;&nbsp;&nbsp;&nbsp;</i><i class="fas fa-phone float-right" >&nbsp;&nbsp;&nbsp;&nbsp;</i><i class="fas fa-video float-right">&nbsp;&nbsp;&nbsp;&nbsp;</i>
</div>

<?php

if(isset($_GET['chat_group'])){              
  $chat_group = $_GET['chat_group'];
  $sql = "SELECT `message`,`message_time`,`chat_group_sender` FROM `chat_group_message` WHERE `chat_group_reciver_group_id` = $chat_group ORDER BY `chat_group_message`.`message_time` ASC";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)> 0){
      while ($row = mysqli_fetch_assoc($result)){
        
        echo ' 
        <div class="media text-muted pt-3">
        
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark">';
            if($row ["chat_group_sender"] != $_SESSION['user_name']){ echo  $row ["chat_group_sender"];}
            
            echo '</strong>';

            if($row ["chat_group_sender"] == $_SESSION['user_name']){
              echo '
              <i>
            <strong class="text-info">' . $row ["chat_group_sender"].'</strong>
            <span class="d-block text-info">'.$row ["message"].' - <i>' . time_elapsed_string($row ["message_time"]).'</i> </span>
            </i>';
            }
            
         echo '</div> <span class="d-block">';
          if($row ["chat_group_sender"] != $_SESSION['user_name']) { echo  $row ["message"].' - <i>' . time_elapsed_string($row ["message_time"]);}
          
          
          echo '</i> </span>
        </div>
      </div>
      ';
      }
  }
}
?>
<div class="card bg-white" >



    <div class="card-body">
                <div class="d-flex mt-1">
                <form method="POST"z>
                    <textarea name="typeMessage" style="width: 40rem;"  dir="auto" data-region="send-message-txt" class=" form-control  bg-white" rows="3"
                        data-auto-rows="" data-min-rows="3" data-max-rows="5" role="textbox"
                        aria-label="Write a message..." placeholder="Write a message..."
                        style="resize: none" id="chatBox"></textarea>
                        <button type="submit" name="send" class="btn btn-info mt-2 float-right "  onclick="sendStatus()">SEND</button>
                        
                        </form>
                        
                        
                </div>
                
            </div>
            

</div>

    <?php
    if(isset($_POST['send'])){

 
      $message   =  $_POST['typeMessage'];
      $message_time   =  "2019-10-09 00:00:00.000000";
      $chat_group_sender  =   "achchuthan";
      $chat_group_reciver_group_id  = 4;
  
      $sql = "INSERT INTO `chat_group_message` (`message`, `message_time`, `chat_group_sender`, `chat_group_reciver_group_id`) VALUES ('$message',NOW(),'$chat_group_sender','$chat_group_reciver_group_id')";
   
      if (mysqli_query($con, $sql)) {
        $resultSte="SEND";

      } else {
        echo "INSERT Error: " .mysqli_error($con);
        $resultSte="fail";
      
  }
}

?>
</div>










<div class="col-5">


<div class="card-body p-3 mb-2 bg-primary text-white rounded">
<p class="card-text folat-right "><h5>Group</h5>



</form>


</div>
<!-- <button type="button" name="Join"  class="btn text-dark float-right" data-toggle="modal" data-target="#exampleModal">
Join </button> -->

<?php
    if(isset($_POST['Join'])){

 
      $message   =  $_POST['typeMessage'];
      $message_time   =  "2019-10-09 00:00:00.000000";
      $chat_group_sender  =   "achchuthan";
      $chat_group_reciver_group_id  = 4;
  
      $sql = "INSERT INTO `chat_group_member` (`student_fullname`, `chat_group_name`, `chat_group_sender`, `chat_group_reciver_group_id`) VALUES ('$student_fullname',NOW(),'$chat_group_name')";
   
      if (mysqli_query($con, $sql)) {
        $resultSte="Join group";

      } else {
        echo "INSERT Error: " .mysqli_error($con);
        $resultSte="fail";
      
  }
}

?>













<ul class="list-group list-group-flush ">
<li class="list-group-item list-group-item-action"> 


<?php

$sql = "CALL chat_group()"; 
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0){
    while ($row = mysqli_fetch_assoc($result)){
      
        echo'<i class="fas fa-user-circle"></i> <button type="button " name="Join"  class="btn text-white btn-sm float-right bg-secondary" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-user-plus"></i> </button><a href="?chat_group='.$row ["chat_group_id"].'" onclick="changeTextFD()">
        <tr> 
       
        <td>' . $row ["chat_group_name"].'</td>
        
        
       </i><small id="emailHelp" class="form-text text-muted float-center">
        </small></li><li class="list-group-item list-group-item-action">
        
        </tr>
        </a>';
    }
}else{
echo "0 results";
}

?>
           

</div>
</ul>







<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

         



      <div class="modal-body">
     <form>
  <h5>Do you want to join this group</h5>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name="Yes" class="btn btn-primary">Yes</button>
      </div>
    
  </div>






<script>
function changeTextFD(){
document.getElementById("chatBox").focus();
}

function sendStatus(){
var ststus = <?php echo $resultSte ?>;
document.getElementById("typeMessage").value=ststus;
}
</script>

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php 
include_once("footer.php");
?>
<!-- END DON'T CHANGE THE ORDER -->