<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- <h1 class="text-center">SLGTI Hostel Management</h1>
<p  class="text-center display-4"  style="font-size:25px;">Welcome to SLGTI Hostel Management <br> -->




          <!-- Content here -->

        <?php
        if(isset($_POST['allo'])){
        if(!empty($_POST['id'])&&!empty($_POST['name'])&&!empty($_POST['dept'])&&!empty($_POST['address'])&&!empty($_POST['dist'])&&!empty($_POST['dis'])
        &&!empty($_POST['gender'])&&!empty($_POST['block'])&&!empty($_POST['room'])&&!empty($_POST['date'])&&!empty($_POST['leave'])){
          
          $id=$_POST['id'];
          $name =$_POST['name'];
          $dept =$_POST['dept'];
          $address =$_POST['address'];
          $dist =$_POST['dist'];
          $dis =$_POST['dis'];
          $gender =$_POST['gender'];
          $block =$_POST['block'];
          $room =$_POST['room'];
          $date =$_POST['date'];
          $leave =$_POST['leave'];
          $sql= "INSERT INTO `hostel` (`student_id`, `fullname`, `department_name`, `address`, `district`, `distance`, `gender`, `block_no`, 
          `room_no`, `date_of_addmission`, `date_of_leaving`) VALUES ('$id', '$name', '$dept', '$address', '$dist', '$dis', '$gender', '$block', '$room', '$date', '$leave')";
          if(mysqli_query($con,$sql)){
              echo "new record create sucessfully ";
          }else{
              echo "error :".$sql."<br>".mysqli_error($con);
          }
        }
        }
      
        ?>

          <br>
          <div class="shadow p-3 mb-5 bg-white rounded">
        
            <blockquote class="blockquote ">
                <p class="display-4 text-center" >Hostel Management System</p>
                <footer class="blockquote-footer text-center"">Hostel Allocation <cite title="Source Title"></cite></footer>
            </blockquote>
        
</div>
        
     
<div class="row">

<div class=" col-sm-6 mt-4">
<small class="h5" >Hostel Accomadation </small>

</div>
<div class="col-sm-3 " > 

<form class="form-inline md-form form-sm mt-4 ">
 
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search_Student_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i> 
</form>
</div>
</div>
<div class="row">

<div class="col-sm-12" >

<hr  >
</div>

</div>

<form action="" method="POST">

<div class="form-row">
       
       <div class="form-group col-md-4 ">
       <label for="id"><i class="fas fa-user-graduate"></i> Student ID&nbsp;</label> <br>
       <input type="text" class="form-control " id="id" name="id"  >
       </div>

       
    
       
       <div class="form-group col-md-4  ">
       <label for="name"><i class="far fa-id-card"></i>&nbsp;Full Name</label> <br>
       <input type="text" class="form-control " id="name">
       </div>
       <div class="form-group col-md-4  ">
       <label for="name"><i class="fas fa-university"></i>&nbsp;Department</label> <br>
       <input type="text" class="form-control " id="name" name="dept">
       </div>
       </div>

       
<div class="form-row">

<div class="form-group col-md-6  ">
       <label for="ad"><i class="fas fa-map-marked-alt"></i>&nbsp;Address</label> <br>
       <textarea name="address" class="rounded  form-control  text-black"  type="text" id="add" placeholder="House-No, Street, Hometown." cols="15" rows="3"  ></textarea>
        </div>


        <div class="col-md-4 mb-3">
            <label for="district"><i class="fas fa-map-marker-alt"></i>&nbsp;District</label>
            <input type="text" class="form-control" id="district" name="dist"  required>
          </div>

          <div class="col-md-2 mb-3">
            <label for="dis"><i class="fas fa-map-signs"></i>&nbsp;Distance
             <label class="note" style="font-size: 13px; margin-bottom: 0; color:#aaa;padding-left: 14px;">Home to SLGTI </label>
            </label>
            <input type="text" class="form-control" id="dis" name="dis" placeholder="in km"  required>
          </div>

       </div>


<div class="form-row">


<div class="form-group col-md-3  ">
<label for="hostel"><i class="fas fa-transgender"></i>&nbsp;Gender :</label>
<select name="title" id="gender" name="gender" class="form-control" >
               <option value="" selected disabled>---Select---</option>
               
               <option value="male">  Male </option>
                    <option value="female"> Female </option>
                    
         </select>
         </div>


         
         <div class="form-group col-md-3  ">
         <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Block No:</label>
        
         <input type="text" class="form-control" id="block" name="block"  required>
</div>

<div class="form-group col-md-3  ">
         <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Room No:</label>
        
         <input type="text" class="form-control" id="room" name="room"  required>
</div>
</div>






<div class="form-row">
<div class="col-md-3 mb-3">
            <label for="add"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Addmission</label>
            <input type="date" class="form-control" id="add" name="date" placeholder=""  required>
          </div>

          <div class="col-md-3 mb-3">
            <label for="leave"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Leaving</label>
            <input type="date" class="form-control" id="leave" name="leave" placeholder=""  required>
          </div>
          </form>
          </div>
         
        <div class="row">
    <div class="col-md-3 col-sm-12 ">
    <br> <br>
   
    <button type="submit" value="allo" name="allo" class="btn btn-primary rounded-pill btn-block waves-effect">
        <i class="fa fa-paper-plane "></i> Allocated</button><br>
    </div>
    
   
    
    <div class="col-md-3 col-sm-12">
    <br><br>
    <button type="reset" class="btn btn-outline-danger rounded-pill btn-block waves-effect  ">
        <i class=" fas fa-bolt  "></i> clear</button>

</div>
</div>
   



          
        















<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
