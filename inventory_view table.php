<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!-- end default code -->

<!-- start my code -->
<form>
<div class="w-100"></div>
                        <div class="col form-group ml-5 mr-5 mt-3 container">
                            <input type="text" class="form-control" id="search" aria-describedby="Department ID" placeholder="search">
                            <button type="submit" class="btn btn-success ml-2 mt-3 float-right">search </button>
                            <small id="bookNameHelp" class="form-text text-muted"></small> 
        <div class="container" style=" margin-top: 10%; border: 2px solid 	#ADD8E6; border-radius: 8px;"> 
            <div class="row">

            
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Department Id</th>
      <th scope="col">Item Id</th>
      <th scope="col">Qunatity</th>
      <th scope="col">sataus</th>
      <th scope="col">supplier</th>
      <th scope="col">supplier phone number</th>
      <th scope="col">date_add</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



</form>



























<!-- end my code\ -->


<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>