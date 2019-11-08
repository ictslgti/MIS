<!-- BLOCK#1 START DON'T CHANGE THE ORDER -->
<?php 
$title = "Notice Table | SLGTI" ;
include_once("config.php"); 
include_once("head.php"); 
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!-- END DON'T CHANGE THE ORDER -->

<!-- BLOCK#2 START YOUR CODER HERE -->

<div class="shadow  p-3 mb-1 bg-white rounded">
	    <div class="highlight-blue col-md-12 col-sm-12">
	        <h2 class="display-4 text-center  text-primary">Event  info list</h2>
	 
	    </div>
	</div>
<br> <br>
	<div class="row">
	    <div class="col-md-12 col-sm-12">
	        <div class="table-responsive table-responsive-sm">
	            <table class="table table-hover">
	                <thead class="table-active">
	                    <tr>
                            <th scope="col">No.</th>
	                        <th scope="col">Event Name</th>
	                        <th scope="col">Venue</th>
	                        <th scope="col">Date</th>
	                        <th scope="col">Chief Guest</th>
                            <th scope="col">Comment</th>
	                        <th scope="col">Actions</th>
	                    </tr>
	                </thead>
                    <?php
                    
                  
                    if(isset($_GET['delete_id'])){
                        $e_id = $_GET['delete_id'];
                        $sql = "DELETE FROM `notice_event` WHERE `event_id`='$e_id'";
                        if(mysqli_query($con,$sql)){
                            echo '
                            <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                            <strong> '.$e_id.' </strong> Record has been Deleted Succesfully 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  ';
                        }else{ 
                            echo'
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong> '.$e_id.' </strong> Cannot delete or update a parent row (foreign key constraint fails)
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  ';   
                        }
                    
                    }
                    ?>
                    <tbody>
                    <?php 

                        $sql="SELECT `notice_event`.`event_id` AS `event_id`,
                        `notice_event`.`event_name` AS `event_name`,
                        `notice_event`.`event_venue` AS `event_venue` ,
                        `notice_event`.`event_date` AS `event_date`,
                        `notice_event`.`event_chief_guest` AS  `event_chief_guest`,
                        `notice_event`.`event_comment` AS  `event_comment`
                        from `notice_event`"; 
                               
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_assoc($result)) {
                                echo '
                                    <tr>
                                        <td>'. $row["event_id"].' </td>
                                        <td scope="row">' . $row["event_name"].  "<br>" .'</td>
                                        <td>'. $row["event_venue"]. "<br>" .'</td>
                                        <td>'. $row["event_date"].  "<br>" .'</td>
                                        <td>'. $row["event_chief_guest"]."<br>" .'</td>
                                        <td>'. $row["event_comment"]. "<br>" .'</td> 
                                        
                                        <td> 
                                        <a href="NoticeEventView.php?id='. $row["event_id"].'" class="btn btn-primary btn-sm btn-icon-split"> <span class="text"><i class="fas fa-eye"></i>&nbsp;&nbsp;View</span>  </a>  
                                        <a href="NoticeEventUpload.php?edit='. $row["event_id"].'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a> 
                                        
                                        <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["event_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
                                    </td> 
                                </tr>';
                                
                            }
                        }
                        else
                        {
                            echo "0 results";
                        }
                    ?>
                           
          <a href="NoticeEventUpload.php"> back</a>

	                </tbody>



<!-- END YOUR CODER HERE -->

    <!-- BLOCK#3 START DON'T CHANGE THE ORDER -->
    <?php 
    include_once("footer.php");
    ?>
    <!-- END DON'T CHANGE THE ORDER -->

