<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<div class="border border-primary rounded">


        <div class="row ">
            <div class="col-sm-12">
                <div class="bg-primary text-warning">
                <h1  style="color:white;"> <i class="fas fa-chart-line"></i> View Result </h1>
                </div>
            </div> 
        </div>

        
                  <div class="row ml-2 mr-2 mb-2">

                      <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                          </div>
                      </div>

                                                        

                      <div class="w-100"></div>

                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Department</label>
                            <select class="browser-default custom-select">
                              <option selected>Open this select menu</option>
                              <option value="1">Constrution Technology</option>
                              <option value="2">Electrical & Electronic Technology</option>
                              <option value="3">Food Technology</option>
                              <option value="4">Mechanical Technology</option>
                              <option value="5">Information & Communication Technology </option>
                            </select>
                        </div>                              
                      </div>

                      <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <select class="browser-default custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">Bridging </option>
                                <option value="2">Level-04</option>
                                <option value="3">Level-05</option>
                              </select>
                          </div>   
                      </div>

                      <div class="w-100"></div>
                      <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Batch</label>
                            <select class="browser-default custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">Batch-01(2016/2017) </option>
                                <option value="2">Batch-02(2017/2018)</option>
                                <option value="3">Batch-03(2018/2019)</option>
                              </select>
                          </div>   
                      </div>
                     

                    <div class="w-100"></div>

                        <div class="col-6">
                          <button type="button" class="btn btn-outline-primary"><a href="notice_result_view">View</button> </a>
          
                        </div>  
                  </div>

 
</div>

 
<div class="mod-indent-outer">
</div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->