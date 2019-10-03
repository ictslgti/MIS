<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Department Details | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
 ?>
<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->
<div class="shadow p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Student Details</h1>
                    <h3 class="display-5 text-center">Department Of Information & Communication Technology</h3>
                    <!-- <p class="text-center"></p> -->

                </div>
            </div>
        </div>
    </div>
<!-- <h1>Batch Details of ICT Department</h1> -->

<a href="Add_new_student" button type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add New Student </a>
<!-- <button type="button" class="btn btn-success">+ Add New Batch</button> -->
<br><br>
<table class="table table-hover">
  <thead class="thead-dark">
 
    <tr >
    <th scope="col">Student_ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Enroll Date</th>
      <th scope="col">Status</th>
      <th scope="col">Profile</th>

     
      
    </tr>
  </thead>
  <tbody>
 
  <tr class="table-light">
      
     
      <td>2018/ICT/5IT/15</td>
      <td>N.Abdullah</td>
        <td>2018.10.15 </td> 
        <td><span class="badge badge-success">Active </span></td>
        <th><a href="" class="btn btn-outline-secondary" role="button" aria-pressed="true"><i class="fas fa-eye">&nbsp;&nbsp;View</i></a></th>
        
  
    </tr>
    
   



  </tbody>
  </form>
</table>

<a href="Department" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->