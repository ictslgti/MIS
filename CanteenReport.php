
<!--block 1 start dont change the order-->

<?php 
$title="Daily Report| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
  
    <!-- end dont change the order-->
<!--block 2 start my code here-->  
<div class="shadow p-3 mb-5 bg-white rounded">

        <div class="highlight-blue">
            <div class="container">
                <div class="intro">
                    <h1 class="display-3 text-center">Daily Report</h1>
                    
                 

                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto " >

    <form>
<div class="form-group  p-3 mb-2 bg-light text-dark border border-primary rounded">
   <div class= "row"> 
   <div class="col-4"></div>
   <div class ="col-4"><input type="date" class="form-control" id="datePic" aria-describedby="datePicHelp"></div>

<div class ="col-3"><select class="custom-select d-block w-100" id="Department" required="">
                    <option>All</option>
                    <option>Breakfast</option>
                    <option>Lunch</option>
                    <option>Dinner</option>
               
               
                    
                  
                  </select>
                  </div>
  <div class ="col-1"><button type="button" class="btn btn-success">Go</button></div></div>
  <br><br>
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
      <td></td>
      <td></td>
     
    </tr>
    <tr>
      <th scope="row">lunch</th>
      <td></td>
      <td></td>
   
    </tr>
    <tr>
      <th scope="row">Dinner</th>
      <td ></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Others</th>
      <td ></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row" class="table-secondary">TOTAL SALES</th>
      <td class="table-secondary"></td>
      <td class="table-secondary"></td>
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
      <td class="text-danger"></td>
    </tr>
    <tr>
      <th scope="row" class="text-dark">Costs</th>
      <td class="text-danger"></td>
    </tr>
    <tr>
      <th scope="row" class="text-dark">Net pfofit</th>
      <td class="text-danger"></td>
    </tr>
  </tbody>
</table>
   


   </div>
    
  </form>

</div>
</div>
    


    

    
  
<!--block 3 start dont change the order-->

    <?php include_once("footer.php"); ?>

    
    <!-- end dont change the order-->
