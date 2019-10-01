<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!-- added -->

<!-- start my code -->
<html>

    <body style="background-color: rgb(255,255,255);">
        <?php
            $ictDepartmentName = "Department Of Information & Communication Technology";
            ?>


        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="highlight-blue">
                <div class="container">
                    <div class="intro">
                        <h1 class="display-4 text-center">Asignments Portal</h1>
                        <!-- <H3 class="display-5 text-center"><?php echo $ictDepartmentName ?></H3> -->
                        <p class="text-center">Welcome to examinations portal for lectures or admin. This section to add
                            examinations and assignments/asessments results&nbsp;</p>

                    </div>
                </div>
            </div>
        </div>
<div class="container">
        <div class="row">
                <div class="col">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i
                                            class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Select
                                        Semister&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">Semister 1</option>
                                    <option value="2">Semister 2</option>
                                </select>
                            </div>
                </div>
                <div class="col">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i
                                            class="fas fa-book-open"></i>&nbsp;&nbsp;Select
                                        Module&nbsp;</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Graphic Design</option>
                                    <option value="1">Programming</option>
                                    <option value="2">Database 1</option>
                                    <option value="3">System Analysis and Design</option>
                                    <option value="3">Manage Workplace</option>
                                    <option value="3">Manage Workplace & Communication</option>
                                </select>
                            </div>
                </div>
              </div>



             
              <div class="row">
                  <div class="col">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i
                                            class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Select Asignments Type</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">A1</option>
                                    <option value="2">A2</option>
                                </select>
                            </div>



                  </div>

                  <div class="col">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fas fa-chalkboard"></i>&nbsp;&nbsp;Asessment
                                        Name&nbsp;</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>




                  </div>




              </div>




</div>

        

        <!-- main div -->
        
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-2">

                </div>
                <div class="col-md-auto">
                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add
                        Asessments</button>
                </div>
                <div class="col col-lg-2">

                </div>
            </div>

        </div>
        <br>                                        

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                        <th><center>Module</center></th>
                        <th><center>Module</center></th>
                        <th><center>Module</center></th>



                </thead>
              
            </table>
          </div>



    </body>




</html>



<!-- end my code -->




<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>