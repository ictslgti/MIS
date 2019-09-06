
<!--block 1 start dont change the order-->

<?php 
$title="Canteen report | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
  
    <!-- end dont change the order-->
<!--block 2 start my code here-->  

    <h3>Daily Canteen Report</h3>
    
  

    


    
<table class="table table-hover ">
  <thead class=" thead-dark">
    <tr>
      <th scope="col">SALES TIME</th>
      <th scope="col">Invest</th>
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
      <th scope="row">TOTAL SALES</th>
      <td >19500</td>
      <td>26500</td>
    </tr>
  </tbody>
</table>


<table class="table table-hover ">
  <thead class=" thead-dark">
    <tr>
      <th scope="col">SHAREHOLDERS SCORES</th>
      <th scope="col">END OF PERIOD</th>

      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sales</th>
      <td >26500</td>
    </tr>
    <tr>
      <th scope="row">Costs</th>
      <td>19500</td>
    </tr>
    <tr>
      <th scope="row">Net pfofit</th>
      <td>7000</td>
    </tr>
  </tbody>
</table>
    
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->