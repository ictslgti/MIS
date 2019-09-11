
<!--block 1 start dont change the order-->

<?php 
$title="Canteen report | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
  
    <!-- end dont change the order-->
<!--block 2 start my code here-->  


   <div class= "row"> 
   <div class ="col-4"><h1>Daily Canteen Report</h1></div>
   <div class ="col-4"><input type="date" class="form-control" id="datePic" aria-describedby="datePicHelp"></div>

<div class ="col-1"></div>
  <div class ="col-3"><select class="custom-select d-block w-100" id="Department" required="">
                    <option value="">Type...</option>
                    <option>Breakfast</option>
                    <option>Lunch</option>
                    <option>Dinner</option>
  </div>
</div></div>
<table class="table table-borderless ">
  <thead class=" thead-dark">
    <tr>
      <th scope="col" >SALES</th>
      <th scope="col">Costs</th>
      <th scope="col">Sales</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Breakfast</th>
      <td>6500</td>
      <td>8000</td>
     
    </tr>
    <tr>
      <th scope="row">lunch</th>
      <td>7000</td>
      <td>9000</td>
   
    </tr>
    <tr>
      <th scope="row">Dinner</th>
      <td >4000</td>
      <td>6500</td>
    </tr>
    <tr>
      <th scope="row">Others</th>
      <td >2000</td>
      <td>3000</td>
    </tr>
    <tr>
      <th scope="row" class="table-secondary">TOTAL SALES</th>
      <td class="table-secondary">19500</td>
      <td class="table-secondary">26500</td>
    </tr>
  </tbody>
</table>



<table class="table table-borderless ">
  <thead class=" thead-dark">
    <tr>
      <th scope="col">SHAREHOLDERS SCORES</th>
      <th scope="col">END OF PERIOD</th>

      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="text-dark">Sales</th>
      <td class="text-danger">26500</td>
    </tr>
    <tr>
      <th scope="row" class="text-dark">Costs</th>
      <td class="text-danger">19500</td>
    </tr>
    <tr>
      <th scope="row" class="text-dark">Net pfofit</th>
      <td class="text-danger">7000</td>
    </tr>
  </tbody>
</table>
   


   </div>
    
  <div class="row">
  
  <div class ="col-4"></div>
  <div class ="col-4"></div>
  <div class ="col-1"></div>
  <div class ="col-3"><button type="button" class="btn btn-info">Print</button></div>


  
  </div>

    
  
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->