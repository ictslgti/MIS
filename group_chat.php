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


<div class="row">
<div class="col-4">
</div>






<div class="col-5">
<ul class="nav nav-tabs">
<li class="nav-item">
    <a class="nav-link " href="home.php">Status</a>
  </li>
   <li class="nav-item">
    <a class="nav-link " href="single_chat.php">Chat</a>
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


<div class="card border-light mb-3" style="max-width:900px;">
  <div class="card-header"></div>
  <div class="card-body">
    <p class="card-text">Hi I'm Faheem, How are you</p>
    <p class="card-text">I'm fine and what about you"</p>
    <p class="card-text">I'm fine</p>
    <p class="card-text">Naleefa when you come  SLGTI</p>
    <p class="card-text">I come to tommorow</p>
    <p class="card-text">I'll feel my mahesi</p>
    <p class="card-text">oh realy is it ture</p>
    <p class="card-text">yes. But I love her and not you</p>
    <p class="card-text">Thanks faheem</p>
    <p class="card-text">Just comedy so dont worry ok.I thin about always Naleefa and mahesi</p>
    <p class="card-text">Oh!! my God!!</p>
    <p class="card-text">Faheem you pool and lie</p>
    <p class="card-text">it's true </p>
    <p class="card-text">No No No ha hah hahaha haha h ha.....</p>
    <p class="card-text">Sorry it comedy not CDS ok </p>
    <p class="card-text">I Now</p>
    <p class="card-text">yes.But Hanusiya always watched BIG BOSS</p>
    <p class="card-text">Ah next Call the HOD to complain so metter finish.</p>
    <p class="card-text">Ah That's good idea</p>
    
    
  </div>
</div>

<div class="card border-light mb-3" style="max-width:900px;">
  
  <div class="card-body">
  <div class="d-flex mt-1">
                    <textarea dir="auto" data-region="send-message-txt" class="form-control bg-light" rows="3" data-auto-rows="" data-min-rows="3" data-max-rows="5" role="textbox" aria-label="Write a message..." placeholder="Write a message..." style="resize: none"></textarea>
                    <button class="btn btn-link btn-icon icon-size-3 ml-1 mt-auto" aria-label="Send message" data-action="send-message">
                        <span data-region="send-icon-container"><i class="icon fa fa-paper-plane fa-fw " aria-hidden="true"></i></span>
                        <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw " title="Loading" aria-label="Loading"></i></span>
</span>
                    </button>
                </div>
                </div>
  </div>

</div>






<div class ="col-3">
  <div class="card-body p-3 mb-2 bg-dark text-white">
  <p class="card-text "><form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
  </div>
  <ul class="list-group list-group-flush ">
    <li class="list-group-item list-group-item-action"> <i class="fas fa-user-circle"></i> <?php

$sql = "SELECT * FROM `chat_group` where `chat_group_id`=''";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        echo'
        <tr>
        <td>' . $row ["chat_group_id"].'</td>
        <td>' . $row ["chat_group_name"].'</td>
       
        </tr>';
    }
}else{
echo "0 results";
}

?> 
 <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>  <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>   <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>   <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i>  <h5><i class="fas fa-envelope-open-text float-right"></i><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
   
   
  </ul>
</div>
</div>
</div>
</div>
</div>
</div>




 <!-- /#sidebar-wrapper -->
 <!-- Page Content -->
 

 

 
                

                
                
                

<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php include_once ("menu.php"); ?>   
    <!-- END DON'T CHANGE THE ORDER -->