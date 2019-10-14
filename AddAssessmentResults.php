<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START MY CODER HERE -->
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
                    <H3 class="display-5 text-center"><?php echo $ictDepartmentName ?></H3>
                    <p class="text-center">Welcome to examinations portal for lectures or admin. This section to add
                        examinations and assignments/asessments results&nbsp;</p>

                </div>
            </div>
        </div>
    </div>

        <!-- card start -->

        <div class="table container">
            <!-- <div class="shadow p-3 mb-5 bg-white rounded"> -->
            <div class="card">
                <br>
                <div class="container">
                    <div class="intro">
                        <h3 class="display-5 text-center">Add Asignments Marks</h3>
                    </div>
                </div>
                <br>
            </div>
            <!-- </div> -->
        </div>
    
        <!-- end start -->

        <br>

        <!-- main table container start -->
        <div class="table container">


            <!-- mainform start  -->
           
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><i
                                class="fas fa-graduation-cap"></i>&nbsp;&nbsp;Select
                            Semister&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Semister 1</option>
                        <option value="2">Semister 2</option>
                    </select>
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><i
                                class="fas fa-book-open"></i>&nbsp;&nbsp;Select
                            Module&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><i
                                class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Select Asignments</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">A1</option>
                        <option value="2">A2</option>
                    </select>
                </div>

                <br>

                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <!-- main button  -->
                            <button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i>&nbsp;Ok
                                </button>
                        </div>
                    </div>
                </div>
           
            <!-- main form end -->

            <br>
            <br>
            <br>

            <?php
        // modules for ict sem1
     $Sem1module1 = 'Database';
     $Sem1module2 = 'Graphic Design';
     $Sem1module3 = 'Programming';
     $Sem1module4 = 'Testing';
     $Sem1module5 = 'ICT';
    //  students details
    $stdname = 'midhusahn';


     ?>
     
            <div class="card">
                <br>
                <div class="container">
                    <div class="intro">
                        <h3 class="display-5 text-center">Enter Asignments Marks</h3>
                    </div>
                </div>
                <br>
            </div>
            <br>

            <!-- table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Student Roll Number</th>
                        <th scope="col">Student Full Name</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter the Marks"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </td>
                        <td scope="row">
                            <h3 class="text-success">Pass</h3>
                        </td>
                    </tr>
                    <tr>

                        <th scope="row">2</th>
                        <td>Jacob</td>

                        <td>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" placeholder="Enter the Marks"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>

                        <td>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" placeholder="Enter the Marks"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <!-- end of add table -->
            <br>
            <!-- save button start -->
            <div class="row">
                <div class="col">

                </div>
                <div class="col-md-auto">

                </div>
                <div class="col col-lg-2">
                    <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;<i
                            class="fas fa-save"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
            <!-- save button end -->
            <br>
            <br>
            <br>
            <br>
            <!-- card start -->
            <div class="card">
                <br>
                <div class="container">
                    <div class="intro">
                        <h3 class="display-5 text-center">Overall Module Marks</h3>
                    </div>
                </div>
                <br>
            </div>
            <!-- end card -->
            <br>
            <!-- <div class="row">
                <div class="col">
                    1 of 2
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Student's Index Number"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"
                                id="button-addon2">&nbsp;&nbsp;&nbsp;<i
                                    class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- small view table start  -->
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Student Index Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Module Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
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
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            <!-- small view table end -->
            <!-- print mode start -->
         
            <br>
            <br>
            <br>
            <br>


<!-- sinna table -->
            <div class="card">
                <br>
                <div class="container">
                    <div class="intro">
                        <!-- <h3 class="display-5 text-center">Overall Module Marks</h3> -->
                        <div class="row">
                            <div class="col">
                                <h3 class="display-5 text-center">Overall Module Marks</h3>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Student's Index Number"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="button-addon2">&nbsp;&nbsp;&nbsp;<i
                                                class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <br>
            

            <!-- sinna table thodakkam -->

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Student Index Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Module Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
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
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col">

                </div>
                <div class="col-md-auto">
                        <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;<i class="far fa-edit"></i>&nbsp;&nbsp;Update&nbsp;&nbsp;&nbsp;</button>

                </div>
                <div class="col col-lg-2">
                    <button type="button" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;<i
                            class="fas fa-print"></i>&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
            <!-- small view table end -->

            <!-- main table container end below -->
        </div>
        <!-- end mode  -->


        
        




    </body>

</html>
<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>