<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<?php
        if(isset($_GET['delete_id'])){                
            $s_id = $_GET['delete_id'];
            $sql = "DELETE from issued_books where record_id ='$s_id'";

            if(mysqli_query($con,$sql)){
                echo '
                <div class="alert alert-success alert-dismissible mt-2 mr-5 ml-5" role="alert">
                Record No <strong> '.$s_id.' </strong> has been Deleted Succesfully 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>  ';
            }
            else {
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> '.$s_id.' </strong> Cannot delete or update a parent row (foreign key constraint fails)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>  ';               
            
            }
        }
    ?>

<div class=" rounded bg-danger ml-2 mr-2 mt-3 ">
  <i class="ml-3 mr-2 mb-2 text-light fas fa-lg fa-brain" ></i>  
  <a class="navbar-brand text-white font-weight-bold"><strong>LIBRARY MANAGEMENT SYSTEM</strong></a>                   
</div>

<div class="card-deck ml-5 mr-5 pt-4">
  <div class="card">
    <img src="img/library_25.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Books Listed</h5>
      <p class="h1">
      <?php
          $noOfRows=null;
          $sql1="SELECT COUNT(book_id) AS NumberOfBooks FROM books WHERE book_status='active'";
          $result=mysqli_query($con,$sql1);
          if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_assoc($result);
            $noOfRows=$row["NumberOfBooks"];
            echo $noOfRows;
          }
        ?>
      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <strong>
      Last update Time : 
      <?php
          $lastUpdateTime=null;
          $sql1="SELECT UPDATE_TIME
          FROM   information_schema.tables
          WHERE  TABLE_SCHEMA = 'mis'
          AND TABLE_NAME = 'books'";
          $result=mysqli_query($con,$sql1);
          if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_assoc($result);
            $lastUpdateTime=$row["UPDATE_TIME"];
            echo $lastUpdateTime;
          }
        ?>
      </strong>      
      </small>
    </div>
  </div>
  <div class="card">
    <img src="img/library_25.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Times Book Issued</h5>
      <p class="h1">

        <?php
          $noOfRows=null;
          $sql1="SELECT COUNT(record_id) AS NumberOfBooks FROM issued_books";
          $result=mysqli_query($con,$sql1);
          if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_assoc($result);
            $noOfRows=$row["NumberOfBooks"];
            echo $noOfRows;
          }
        ?>

      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <strong>
      Last update Time : 
      <?php
          $lastUpdateTime=null;
          $sql1="SELECT UPDATE_TIME
          FROM   information_schema.tables
          WHERE  TABLE_SCHEMA = 'mis'
          AND TABLE_NAME = 'issued_books'";
          $result=mysqli_query($con,$sql1);
          if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_assoc($result);
            $lastUpdateTime=$row["UPDATE_TIME"];
            echo $lastUpdateTime;
          }
        ?>
      </strong>
      </small>
    </div>
  </div>
  
  <a data-toggle="modal" href="#myModal" style ="text-decoration: none">
  <div class="card">
    <img src="img/library_25.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Overtimed Borrows</h5>
      <p class="h1">
      <?php
          $noOfRows=null;
          $sql1="SELECT COUNT(record_id) AS NumberOfBooks FROM issued_books WHERE issued_date <= (SELECT DATE_ADD(now(), INTERVAL -7 DAY))";
          $result=mysqli_query($con,$sql1);
          if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_assoc($result);
            $noOfRows=$row["NumberOfBooks"];
            echo $noOfRows;
          }
        ?>
      </p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <strong>
      Last update Time : 
      <?php
          $lastUpdateTime=null;
          $sql1="select NOW() AS now";
          $result=mysqli_query($con,$sql1);
          if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_assoc($result);
            $lastUpdateTime=$row["now"];
            echo $lastUpdateTime;
          }
        ?>
      </strong>
      </small>
    </div>
    </a>
  </div>
</div>

<div class="card-deck pt-5 pl-3 pr-3">
<a href="AddBook.php" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-primary" style="max-height: 14rem;">
  <div class="card-header"><b>Add Book</b></div>
    <div class="card-body">
      <p class="card-text">By clicking here you can add new books and their new copies to the libarary quickly.</p>
      <button type="submit" class="btn btn-light">Add Book</button>
    </div>
</a>
  </div>
  <a href="IssueBook.php" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-success" style="max-height: 14rem;">
  <div class="card-header">Issue Book</div>
    <div class="card-body">
      <p class="card-text">You can Issue a book to a member here. But issue only one book per member at a time.</p>
      <button type="submit" class="btn btn-light">Issue Here</button>
    </div>
    </a>
  </div>
  <a href="IssuedBook.php" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-secondary" style="max-height: 14rem;">
  <div class="card-header">Manage Issued books</div>
    <div class="card-body">
      <p class="card-text">Return borrowed books here and able to add fine also. able to extend the borrow period.</p>
      <button type="submit" class="btn btn-light">Issued books</button>
    </div>
    </a>
  </div>

  <a href="ViewBooks.php" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-info" style="max-height: 14rem;">
  <div class="card-header">Manage books</div>
    <div class="card-body">
      <p class="card-text">View all the books and their copies there are available in this library. And also able to edit.</p>
      <button type="submit" class="btn btn-light">Manage books</button>
    </div>
    </a>
  </div>
</div>



  <!-- Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class=" mt-3 modal-dialog modal-xl">
    <div class="modal-content">
<!-- navbar and search bar -->
<div class=" rounded-top bg-danger ml-2 mr-2 mt-2 ">
  <i class="ml-2 mr-2 mb-2 text-light far fa-lg fa-calendar-times" ></i>  
  <a class="navbar-brand text-white font-weight-bold">Overtimed Borrows</a>                   
</div>

<!-- print header of the thable -->
     <div class="table-responsive">  
          <table style="width:98.5%" id="books" class="table table-striped table-bordered mt-2 ml-2 mr-2">  
               <thead>  
                    <tr>  
                         <td>#</td>  
                         <td>Member ID</td>
                         <td>Name</td>   
                         <td>Book Serial</td>
                         <td>Book</td>   
                         <td>Issued Date</td>  
                         <td>Actions</td>    
                    </tr>  
               </thead>
               <?php
               
               $query ="select *, books.name, student.student_ininame from issued_books 
               INNER JOIN books
               ON issued_books.book_serial = books.id
               INNER JOIN student
               ON issued_books.member_id = student.student_id
               WHERE issued_date <= (SELECT DATE_ADD(now(), INTERVAL -7 DAY))";
              
               if($result = mysqli_query($con, $query)){
               while($row = mysqli_fetch_array($result)){  
                    echo '  
                         <tr>  
                              <td>'.$row["record_id"].'</td>  
                              <td>'.$row["member_id"].'</td>
                              <td>'.$row["student_ininame"].'</td>   
                              <td>'.$row["book_serial"].'</td>
                              <td>'.$row["name"].'</td>   
                              <td>'.$row["issued_date"].'</td>  
                              <td>
                                   <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["record_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
                                   <a href="returnBook.php?return='. $row["record_id"].'" class="btn btn-sm btn-success"><i class=" text-light far fa-calendar-check" ></i></a>
                              </td>
                         </tr>
                         ';  
               }
              }else{echo'
                <tr>
                  <td colspan="7" align="center" class="text-success"> <strong> GOOD! &#128526; THERE ARE NO OVERTIMED BORROWS </strong></td>
                </tr>
                ';}
               ?>
                          
          </table>
        </div>
        <div>
                        <button  type="button" class="float-right mb-2 mr-2 mt-2 btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
    </div>
  </div>    
</div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
