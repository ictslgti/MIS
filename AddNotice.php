<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->




<div class="container" style="margin-top:5%">
<div class="row" style="border: 2px solid blue; border-top-right-radius: 20px ;border-top-left-radius: 20px ;background-color:blue">
        <div class="col" style=" ">
            <h1 style="color:white;"> ADD NOTICE</h1>
        </div>
</div>

    <div  class="row" style="border: 2px solid blue ;padding:20px; border-bottom-right-radius: 20px ;border-bottom-left-radius: 20px ;">
        


  <div class="row">

        <div class="col-6">
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

      

        <div class="w-100"></div>

        <div class="col-6">
        <div class="form-group">
             <label for="exampleInputEmail1">Course</label>
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
          <label>    Date</label>
                <br>
                  <input type="date">
                        
             
          </div>   
            </div> 
        <div class="w-100"></div>
        <div class="col-6">
        <div class="form-group">
             <label for="exampleFormControlFile1">Attachement</label>
             <input type="file" class="form-control-file" id="exampleFormControlFile1">
       </div>
       
       </div>

       <div class="w-100"></div>

        <div class="col-6">
         
                    <button type="button" class="btn btn-outline-primary">Submit</button> 
                      <button type="button" class="btn btn-outline-warning">Edit</button>
                      <button type="button" class="btn btn-outline-danger">Delete</button>
              
            </div>                              
        </div>
        
    </div>
   


 


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->