<!--  bLOCK#1 start don't change the order-->
<?php 
$title =" Department Deatils| SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- end don't change the order-->



<!-- bLOCK#2 start your code here & u can change -->
<br>

<div class="row border border-light shadow p-3 mb-5 bg-white rounded">
          <div class="col">
          <br>
          <br>
            <blockquote class="blockquote text-center">
                <h1 class="display-4">ADD RESULT</h1> 
                <p class="mb-0">Srilanka German Training Institute</p>
                <footer class="blockquote-footer">Result Description<cite title="Source Title"></cite></footer>
            </blockquote>
          </div>
</div>

<form method="post">
<div class="   mr-5 ml-5 mt-5 mb-5">

    <div class="input-group mb-3 ">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"> 
            <i class="fas fa-award"></i> </i>&nbsp;&nbsp;Result&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>
        <input type="text" class="form-control" id="inputPassword2" name="event_name" placeholder="Result">
    </div> 



    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-university"></i>&nbsp;&nbsp;Department&nbsp;&nbsp;&nbsp;&nbsp;</label>
      </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Select Your Department...</option>
          <option value="1">Electrical & Electronic Technology Department</option>
          <option value="2">Construction Technology Department</option>
          <option value="3">Information & Communications Technology Department</option>
          <option value="4">Mechanical Technology Department</option>
          <option value="5">Food Technology Department</option>
          <option value="6">Automotive & Agricultural Technology Department</option>
        </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">&nbsp;&nbsp;Batch No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Select Your Batch No...</option>
          <option value="1">Batch 01</option>
          <option value="2">Batch 02</option>
          <option value="3">Batch 03</option>
        </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">&nbsp;&nbsp;Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Select Your Level...</option>
          <option value="1">Level 04</option>
          <option value="2">Bridging</option>
          <option value="3">Level 05</option>
          <option value="4">Level 06</option>
        </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> <i class="fab fa-audible"></i>&nbsp;&nbsp;Modules&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      </div>
        <select class="custom-select" id="inputGroupSelect01">
        <option selected>Select the Module...</option>
              <option value="1">Module 01</option>
              <option value="2">Module 02</option>
              <option value="3">Module 03</option>
              <option value="4">Module 04</option>
              <option value="4">Module 05</option>
              <option value="4">Module 06</option>
              <option value="4">Module 07</option>
              <option value="4">Module 08</option>
              <option value="4">Module 09(Manage Workplace Information)</option>
              <option value="4">Module 10(Manage Workplace Communication)</option>
            </select>
        </select>
    </div>
  
    <!-- <div class="input-group mb-3 ">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"> 
            <i class="fas fa-plus"></i>  </i>&nbsp;&nbsp;Add File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>
         <input class="form-control" type="file" name="file" required/></td>
      
    </div> -->
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-md-auto"> 
            <button type="button" class="btn btn-outline-primary" name="add"><i class="fas fa-plus"></i> 
            Add 
            </button>
          
        </div>
        <div class="col-md-auto"> 
            <button type="button" class="btn btn-outline-primary">
            Edit
            </button>
        </div>
        <div class="col-md-auto"> 
            <button type="button" class="btn btn-outline-primary">
            Delete
            </button>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>
</form>

 <!-- end your code here-->




<!--bLOCK#3  start don't change the order-->
    <?php include_once("footer.php");?>
<!-- end don't change the order-->
   
