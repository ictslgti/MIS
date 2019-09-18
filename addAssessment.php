<?php
$title = "Examinations | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER-->

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

        <!-- main div -->
        <div class="table container">
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




        </div>


    </body>




</html>



<!-- end my code -->




<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>