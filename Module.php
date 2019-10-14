	
<!--Block#1 start dont change the order-->
<?php 
$title="Module details | SLGTI";    
include_once ("config.php");
include_once ("head.php");
include_once ("menu.php");
?>
<!-- end dont change the order-->


<!-- Block#2 start your code -->

<hr class="mb-8 mt-4">
  
		<div class="card mt-12 ">
			<div class="card"><br>
				<h4 align="center">Module Details</h4><br>
      </div>
    </div>
<br>
<br>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align:center">
                      <th>Module ID</th>
                      <th>Module Name</th>
                      <th>Module Aim</th>
                      <th>Learning Hours</th>
                      <th>Learning Outcomes</th>
                      <th>Relative Unit</th>
                      <th>Resources</th>
                      <th>References</th>
                      <th>Notional Hours</th>
                      <th>Option</th>
                    </tr>
                  </thead>

                  <?php

                

                if(isset($_GET['dlt']))
                {
                    
                    $m_id = $_GET['dlt'];

                    $sql = "DELETE from module where module_id = $m_id ";

                    if(mysqli_query($con,$sql))
                    {
                        echo"Record has been Deleted Succesfully";
                    }
                    else
                    {
                        echo"Error in Deleting" . mysqli_error($con);
                    }
                }
                ?>

                  <tbody>
                    <tr style="text-align:center">
                      <td>K201</td>
                      <td>Database 1</td>
                      <td>Text Here</td>
                      <td>25</td>
                      <td>18</td>
                      <td>Text Here</td>
                      <td>Text Here</td>
                      <td>Text Here</td>
                      <td>Text Here</td>
                      <td>
                      <button type="button" class="btn btn-outline-success"><i class="far fa-edit">-Edit-</i></button>
                      <a href="#" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i></a>
                     </td>
                    </tr>

                    
                  </tbody>
                </table>

                <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next Page</a>
                </li>
              </ul>
                </nav>
                </div>
 </div>
<body>

</body>
<!-- end your code -->


<!--Block#3 start dont change the order-->
<?php include_once ("footer.php"); ?>  
<!--  end dont change the order-->
    
    
  
