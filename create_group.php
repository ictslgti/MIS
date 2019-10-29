<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Chat | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- Sidebar -->
<div class="row">

<div class="col-7">
<ul class="nav justify-content-last">
<div class="container ">
    <h1 class="display-1 "><h4>New Group</h4>
    <small id="emailHelp" class="form-text text-muted">add subject</small>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type of group subject here">
    <small id="emailHelp" class="form-text text-muted">We'll never share your group with anyone else.</small>
  
</ul>
<button type="button" class="btn btn-outline-dark float-left">Add</button>
  </div> 


<div class="col-5">
<div class="card-body p-3 mb-2 bg-dark text-white ">
  <p class="card-text "><h1><i class="fas fa-users float-right"></h1></i><h5 class="text-center">Student Contact </h5></p> 
  </div>
  <ul class="list-group list-group-flush ">
    <li class="list-group-item list-group-item-action"> 
  <?php

$sql = "CALL std_full_name() ";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)> 0){?>
<form action="#" method="post">
  <?php
    while ($row = mysqli_fetch_assoc($result)){
        echo'
        <tr><i class="fas fa-user-circle"></i>
        <td>' . $row ["student_fullname"].'</td>
        
       <input type="checkbox" name="check_list[]" aria-label="Checkbox for following text right"></input>
  
        <small id="emailHelp" class="form-text text-muted float-center">
        </small><li class="list-group-item list-group-item-action">
        
        </tr>';
    }?>
    </form>
    <?php
}else{
echo "0 results";
}
?> 




  <!-- <ul class="list-group list-group-flush ">
    <li class="list-group-item list-group-item-action"> <i class="fas fa-user-circle"></i> Gafoor Sahan <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Abdullah <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Faheem <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"> </small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Nifras <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Kajan <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Thilogini <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Janani <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Sarujan <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Newsika <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    <li class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Sanjeevan <h5><i class="fas fa-envelope-open-text float-right"></i></h5><small id="emailHelp" class="form-text text-muted float-center"></small></li>
    

   
 </ul> 
 
</div>-->
</div>
</div>
<div>


<button type="button" name="create" class="btn btn-outline-dark float-right rounded-circle"><i class="fas fa-plus"></i></button>

<?php
if(isset($_POST['create'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
}
}
}
?>

<?php

$id= $name = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM `student` WHERE `student_id`='$student_fullname'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id'];
    $name = $row['student_fullname'];
}
}
?>


</div> 
</form>
</div>
</div>
</div>

</div>
</div>

 <!-- /#sidebar-wrapper -->
 <!-- Page Content -->
 

 

 
                

                
                
                

<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");                                                          
    ?>
    <!-- END DON'T CHANGE THE ORDER -->