<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Chat | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
include_once("homenav.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->
<!-- Sidebar -->
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

<div class="row">
    <div class="col-8">
    </div>






    <div class="col-8">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="home.php">Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="group_chat.php">Group chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_group.php">Create group</a>
            </li>
        </ul>
        </nav>
        <div class="card border-light mb-3" style="max-width:1500px;">


            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">Messages</h6>

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




                <small class="d-block text-right mt-3">
                    <a href="#">All suggestions</a>
                </small>
            </div>









            <div class="card-body">
                <div class="d-flex mt-1">
                    <textarea dir="auto" data-region="send-message-txt" class="form-control bg-light" rows="3"
                        data-auto-rows="" data-min-rows="3" data-max-rows="5" role="textbox"
                        aria-label="Write a message..." placeholder="Write a message..."
                        style="resize: none" id="chatBox"></textarea>
                    <button class="btn btn-link btn-icon icon-size-3 ml-1 mt-auto" aria-label="Send message"
                        data-action="send-message">




                         <span data-region="send-icon-container"> <i class="icon fa fa-paper-plane fa-fw " name="Add" value ="Submit"
                                aria-hidden="true">  </i></span>
                        <span class="hidden" data-region="loading-icon-container"><span
                                class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "
                                    title="Loading" aria-label="Loading"></i></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <?php
if(isset($_POST['Add']))
{
  if(!empty($_POST['message'])
  &&!empty($_POST['message_time'])
  &&!empty($_POST['chat_group_sender'])
  &&!empty($_POST['chat_group_reciver_group_id']))
  { 
     //echo $id = $_POST['message'];
     echo $message   =  $_POST['message'];
     echo $message_time   =  $_POST['message_time'];
     echo $chat_group_sender  =   $_POST['chat_group_sender'];
     echo $chat_group_reciver_group_id  =   $_POST['chat_group_reciver_group_id'];
        
     echo $sql = "INSERT INTO `chat_group_message`(`message_id`, `message`, `message_time`, `chat_group_sender`, `chat_group_reciver_group_id`)
     VALUES (null,'$message','$message_time','$chat_group_sender,'$chat_group_reciver_group_id')";
   
      if (mysqli_query($con, $sql)) 
      {
        echo "record add";
      } 
      else 
      {
         echo "Error: " . $sql .
        "<br>" . 	mysqli_error($con); 

      }
  }
}


  ?>


    <div class="col-4">
        <div class="card-body p-3 mb-2 bg-dark text-white">
            <p class="card-text ">
                <form class="form-inline md-form form-sm mt-4">
                    <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search"
                        aria-label="Search" id="search">
                    <i class="fas fa-search ml-3" aria-hidden="true"></i>
                </form>
        </div>
        <ul class="list-group list-group-flush ">
            <li class="list-group-item list-group-item-action"> 

                <?php

$sql = "SELECT * FROM `chat_group` ";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0){
    while ($row = mysqli_fetch_assoc($result)){
      
        echo'<i class="fas fa-user-circle"></i> <a href="?chat_group='.$row ["chat_group_id"].'" onclick="changeTextFD()">
        <tr> 
        <td>' . $row ["chat_group_name"].'</td>
        
        <a ><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center">
        </small></li><li class="list-group-item list-group-item-action"> </a>
        
        </tr>
        </a>';
    }
}else{
echo "0 results";
}

?>

                <!-- <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"></small></li> -->

                <!-- <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>  <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>   <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>   <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>  <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
   
    -->
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>

<script>
function changeTextFD(){
    document.getElementById("chatBox").focus();
}
</script>


<!-- /#sidebar-wrapper -->
<!-- Page Content -->







</body>



<!-- END YOUR CODER HERE -->

<!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
<?php include_once ("menu.php"); ?>
<!-- END DON'T CHANGE THE ORDER -->