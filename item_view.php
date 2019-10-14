<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->



<h1 class="text-center">Item Details</h1>
<br>

<div class="row">

<div class="col-sm-6 " ></div>
<div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  <input class="form-control form-control-sm ml-3 w-75 rounded-pill" type="text" placeholder="Search D_ID" aria-label="Search"id="search"> 
  <i class="fas fa-search ml-3" aria-hidden="true"></i>
</form>
</div>
</div>


  



         <div class="row">   
         <div class="col-12">
         <form>
         <p style="font-size:20px;"> Item_Info <hr color ="black" style="height:1px;"></p><br>
         </form>
</div>
</div>
<table class="table">
  <thead class="thead-r">
    <tr>
      <th scope="col">ITEM ID</th>
      <th scope="col">SUPPLIER ID</th>
      <th scope="col">ITEM PURCHASE</th>
      <th scope="col">ITEM DESCRIPTION</th>
      <th scope="col">ITEM CODE</th>
      <th scope="col">WARRENTY</th>
      <th scope="col">ACTION</th>
      
    </tr>
  </thead>
  <tr>

      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>Ottadsado</td>
      
      <td>
           
            <button type="button" class="btn btn-outline-success"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit</button>&nbsp;&nbsp;
      </td>
    </tr>

    <tr>

<td>Mark</td>
<td>Otto</td>
<td>@mdo</td>
<td>Mark</td>
<td>Otto</td>
<td>Ottadsado</td>

<td>
     
      <button type="button" class="btn btn-outline-success"><i class="far fa-edit"></i>&nbsp;&nbsp;Edit</button>&nbsp;&nbsp;
</td>
</tr>
 
</table>





<div class="row">
<div class="col-6"></div>
<div class="col-3"></div>
<div class="col-2"></div>

<div class="col-md- col-sm- form-group pl- pr-container">
<button type="submit" class="btn btn-primary ml-2 mt-3 float-right">back </button>
                          
                          <button type="submit" class="btn btn-primary ml-2 mt-3 float-right">save </button>
              </div>
      
</div>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->