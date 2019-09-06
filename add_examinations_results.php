<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START MY CODER HERE -->
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>examinations</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.min.css">
        <!-- my css -->
        <style>
        th, td {
            text-align: center;
        }


        </style>
        <!-- my css end -->

    </head>
    <!-- header text -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.min.js"></script>

    <body style="background-color: rgb(255,255,255);">

        <!-- Main PHP Declarations  -->
        <?php
    $ictDepartmentName = "Department Of Information & Communication Technology";
    ?>

    <div class="highlight-blue">
        <div class="container">
            <div class="intro">
                <h1 class="display-4 text-center">Add Asignments Results</h1>
                <H3 class="display-5 text-center"><?php echo $ictDepartmentName ?></H3>
                <p class="text-center">Welcome to examinations portal for lectures or admin. This section to add
                    examinations and assignments/asessments results&nbsp;</p>

            </div>
        </div>
    </div>

<div>
    <img src="img/add_examinations_results_main_cart.jpg" class="img-fluid" alt="Responsive image">
</div>
    
    <br>

        <!-- <div class="card mb-3">
            
            <img src="img/add_examinations_results_main_cart.jpg" class="card-img-top" alt="exampic">
            <div class="card-body">
            </div>
        </div> -->

        

        <!-- mainform start  -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Select Semister</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">Semister 1</option>
                <option value="2">Semister 2</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Select Module</label>
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
                <label class="input-group-text" for="inputGroupSelect01">Select Asignments</label>
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
                <button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i>&nbsp;Add Results</button>
              </div>
             
            </div>

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

        <h1 class="display-4">
            <center><?php echo $Sem1module1 ?></center>
        </h1>



        <!-- <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Student Roll Number </label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder=""><br>

                    <label for="inputPassword4">Student Full Name </label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="">

                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Module2</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
            </div>
        </form><br> -->

        <!-- table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student Roll Number</th>
                    <th scope="col">Student Full Name</th>
                    <th scope="col">Module</th>
                    <th scope="col">Marks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="Enter the Marks" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>\
            </tbody>
        </table>

    </body>

</html>


<!-- END OF MY CODE -->





<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>