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
<div class="col-7">
</div>






<div class="col-5">
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

<div class="card-body p-3 mb-2 bg-dark text-white ">
  <p class="card-text "><h1><i class="fas fa-users float-right"></h1></i><h5 class="text-center">Student Contact </h5></p> 
  </div>
  <ul class="list-group list-group-flush ">

<?php

$sql = "SELECT `message_time`,student_fullname from chat_group_message,student group by student_fullname";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0){
    while ($row = mysqli_fetch_assoc($result)){
      
      echo ' 
      <div class="media text-muted pt-3">
      
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">' . $row ["student_fullname"].'</strong>
          <i>' . time_elapsed_string($row ["message_time"]).'</i>
        </div>
      </div>
    </div>
    ';
    }
}


?>


   

    <small class="d-block text-right mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div>





     
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




 <!-- /#sidebar-wrapper -->
 <!-- Page Content -->
 

 

 
                

                
                
                

<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php include_once ("menu.php"); ?>   
    <!-- END DON'T CHANGE THE ORDER -->