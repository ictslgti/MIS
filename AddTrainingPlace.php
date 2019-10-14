 <!--START Don't CHANGE THE ORDER-->
 <?php 
$title ="Home | SLGTI";
 include_once("config.php");
 include_once("head.php");
 include_once("menu.php");
 ?>
 <!--END Don't CHANGE THE ORDER-->

 <!--START YOUR CODER HERE-->
 <div class=row>
        <div class="col">
          <br>
          <br>
          <h1>Add Student's Final Training Place</h1>
          <br>
          <br>
          </div>
  </div>
        <div class=row>
        <div class="col">
 <table class="table table-hover table-light">
  <thead>
    <tr>
      <th scope="col" class="bg-primary">No</th>
      <th scope="col" class="bg-primary"><i class="fas fa-address-card">..</i>Student ID</th>
      <th scope="col" class="bg-primary"><i class="fas fa-phone-volume"></i>..Phone number</th>
      <th scope="col" class="bg-primary"><i class="far fa-envelope">..</i>E-mail</th>
      <th scope="col" class="bg-primary"><i class="far fa-building">..</i>Department</th>
      <th scope="col" class="bg-primary"><i class="fas fa-industry">..</i>..Place / company</th>
      <th scope="col" class="bg-primary"><i class="fas fa-map-marker-alt">..</i>Place Address</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><select class="form-control" id="exampleFormControlSelect1">
                    <option></option>
                    <option>Information & Communication Technology</option>
                    <option>Food Technology</option>
                    <option>Automotive Technology</option>
                    <option>Electrical & Electronics</option>
                    <option>Mechanical</option>
                    </select></td>
      <td>colombo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><select class="form-control" id="exampleFormControlSelect1">
                    <option></option>
                    <option>Information & Communication Technology</option>
                    <option>Food Technology</option>
                    <option>Automotive Technology</option>
                    <option>Electrical & Electronics</option>
                    <option>Mechanical</option>
                    </select>
      </td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry the Bird</td>
      <td>@twitter</td>
      <td>Mark</td>
      <td><select class="form-control" id="exampleFormControlSelect1">
                    <option></option>
                    <option>Information & Communication Technology</option>
                    <option>Food Technology</option>
                    <option>Automotive Technology</option>
                    <option>Electrical & Electronics</option>
                    <option>Mechanical</option>
                    </select>
      </td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
</div>
</div>

<div class="row float-right ml-5">
<div class="col">
<button type="button" class="btn btn-outline-primary">Save</button>
<button type="button" class="btn btn-outline-danger">Delete</button>
<button type="button" class="btn btn-outline-info">Update</button>
</div>
</div><br>



    

<!--END OF YOUR CODER-->

  <!--START Don't CHANGE THE ORDER-->   
<?php 
 include_once("footer.php");
?>
 <!--Don't CHANGE THE ORDER-->