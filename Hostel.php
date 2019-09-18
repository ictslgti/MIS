<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<div class="classic-tabs">

<ul class="nav nav-tabs bg-info" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">Contact</a>
  </li>
</ul>









<div style="margin-top:30px ">
  <div class="card ">
   <div class="card-header bg-info">
      <div class="row">
        <div class="col-md-9" >
       
                <label style="font-family: 'Luckiest Guy', cursive; font-size: 20px; "> <i class="fas fa-user-graduate"></i> &nbsp; Student Accomadation</label>
                <!-- <footer class="blockquote-footer" style=" padding-left: 650px">Hostel Allocation <cite title="Source Title"></cite></footer> -->
            
        </div>
        
      </div>
    </div>

    <div class="card-body">
    <div class="table-responsive">
        <!-- <span id="message_operation"></span> -->

       

<table class="table table-hover   mt-4 " id="Hostel accomadation">
<thead>
<tr>

      <th scope="col"><i class="far fa-id-card"></i>&nbsp;Student_id</th>
      <th scope="col"><i class="fas fa-file-signature"></i>&nbsp;Full Name</th>
      <th scope="col"><i class="fas fa-transgender"></i>&nbsp;Gender</th>
      <th scope="col"><i class="fas fa-list-ol"></i>&nbsp;Block no</th>
      <th scope="col"><i class="fas fa-list-ol"></i>&nbsp;Room no</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Admission</th>
      <th scope="col"><i class="fas fa-calendar-alt"></i>&nbsp;Leaving date</th>
      <th scope="col"><i class="fas fa-map-marked-alt"></i>&nbsp;Address</th>
      <th scope="col"><i class="fas fa-map-marker-alt"></i>&nbsp;District</th>
      <th scope="col"><i class="far fa-caret-square-right"></i>&nbsp;Action</th>
    </tr>

   


    

</thead>

<tbody>
<tr>
    <td>ict/bit/04  </td>
    <td>Atputharsa.Rewathy  </td>
    <td>Girl  </td>
    <td>B-12  </td>
    <td>Room-1  </td>   
    <td>11/2/1996  </td>
    <td>11/2/1996  </td>
    <td>Puttur  </td>
    <td>Jaffna  </td>
    <td>
    <form>
    <a href="AddHostel.php">
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="far fa-edit"></i>
    </button></a>

    <a href="AddHostel.php">
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="fas fa-minus-circle"></i>
    </button></a>
    
    </form>
     </td>
    </tr>

<tr>
    <td>ict/bit/04  </td>
    <td>Atputharsa.Rewathy  </td>
    <td>Girl  </td>
    <td>B-12  </td>
    <td>Room-1  </td>
    <td>11/2/1996  </td>
    <td>11/2/1996  </td>
    <td>Puttur  </td>
    <td>Jaffna  </td>
    <td><form>
    <a href="AddHostel.php">
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="far fa-edit"></i>
    </button></a>

    <a href="AddHostel.php">
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="fas fa-minus-circle"></i>
    </button></a>
    
    </form></td>
    
    </tr>


    <tr>
    <td>ict/bit/04  </td>
    <td>Atputharsa.Rewathy  </td>
    <td>Girl  </td>
    <td>B-12  </td>
    <td>Room-1  </td>
    <td>11/2/1996  </td>
    <td>11/2/1996  </td>
    <td>Puttur  </td>
    <td>Jaffna  </td>
     <td><form>
    <a href="AddHostel.php">
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="far fa-edit"></i>
    </button></a>

    <a href="AddHostel.php">
    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
    <i class="fas fa-minus-circle"></i>
    </button></a>
    
    </form></td>
    
    </tr>

</tbody>
</table>
</div>
   </div>
  </div>
</div>
</div>








<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
