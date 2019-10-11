		
<!--Block#1 start dont change the order-->
<?php 
$title="Add Course details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<div class="row">
    <div class="col">
    <hr>
    </div>
    </div>

  <div class="row">
    <div class="col text-center">
    <h1>Students Assessments Results</h1>
    </div>
    </div>

    <div class="row ">
    <div class="col text-center">
    <h3 class="display-6">Department of Information & Communication Technology</h3>
    </div>
    </div>

<br>


<div class="row">
    <div class="col">
    <hr color ="black" style="height:1px;">
    </div>
    </div> 
    

    <div class="row ">
    <div class="col-4"></div>
    <div class="col-4"></div>
    <div class="col-sm-3 " > 
<form class="form-inline md-form form-sm mt-4">
  
 <input type="text"  class="form-control form-control-sm ml-3 w-75 rounded-pill" placeholder="Search-Module_Id" aria-label="Search"id="search"
        aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="fas fa-search btn btn-outline-success sm ml-3 w-75 rounded-pill" aria-hidden="true" type="button" id="button-addon2"></button>
    </div>


</form>
</div>
    
    </div>

    <br>
    <br>

    <div class="row">
    <div class="col text-center">
    <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="	fas fa-dice-d6"></i>&nbsp;&nbsp;Select
                                        Semister&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Choose...</option>
                                    <option value="1">Semister 1</option>
                                    <option value="2">Semister 2</option>
                                </select>
                            </div>
    </div>



    <div class="col text-center">
    <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-book-open"></i>&nbsp;&nbsp;Select Module&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Choose...</option>
                                    <option value="1">Grapphic Design</option>
                                    <option value="2">Networking</option>
                                </select>
                            </div>
    </div>

    <div class="col text-center">
    <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-edit"></i>&nbsp;&nbsp;Select Assessment Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected="">Choose...</option>
                                    <option value="1">Written</option>
                                    <option value="2">Practical</option>
                                </select>
                            </div>
    </div>

    <div class="col-2 text-left">
    <button type="button" class="btn btn-outline-success rounded-pill">submit</button>
    </div>
    </div>
<br>
<br>

  <div class="row">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Assessment-Id</th>
      <th scope="col">Assessment-Date</th>
      <th scope="col">Assessment-Marks</th>
      <th scope="col">Percentage</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
  </div>

<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  