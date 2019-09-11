<?php
$title = "Department Details | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<form class="form-inline">
    <div class="form-group mb-2">
        <label for="staticEmail2" class="sr-only">Student ID</label>
        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Student ID">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only">Password</label>
        <input type="password" class="form-control" id="inputPassword2" placeholder="Student ID">
    </div>
    <button type="submit" class="btn btn-primary mb-2">View</button>
</form>
<form>

    <div class="row border border-dark" id="printableArea">
        <div class="col form-group container p-3 mb-2">
            <div class="px-lg-5 container">
                <div>
                    <img src="img/ministry.png" class="rounded float-left;" width="100" height="100" alt="">
                    <img src="img/SLGTI.png" class="rounded float-right" width="250" height="85" alt="">

                </div>
                <hr class="my-1">
                <div>
                    <h1 class="text-center font-weight-bold">Sri Lanka German Training Institute</h1>
                </div>


                <div class="container px-lg-5">
                    <div class="row mx-lg-n5">
                        <div class="col py-3 px-lg-5 border bg-light">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Modules</th>
                                        <th scope="col">Marks</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Module 1</th>
                                        <td>Mark</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Module 2</th>
                                        <td>Jacob</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Module 3</th>
                                        <td>Larry</td>
                                    </tr>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Semester I</th>
                                            <th scope="col">Marks</th>

                                        </tr>
                                    </thead>


                                </tbody>
                            </table>

                        </div>

                        <div class="col py-3 px-lg-5 border bg-light">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Modules</th>
                                        <th scope="col">Marks</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Module 1</th>
                                        <td>Mark</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Module 2</th>
                                        <td>Jacob</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Module 3</th>
                                        <td>Larry</td>

                                    </tr>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Semester II</th>
                                            <th scope="col">Marks</th>

                                        </tr>
                                    </thead>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

</form>


<?php include_once("footer.php"); ?>
