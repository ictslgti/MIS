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
        if(isset($_POST['returnBtn'])){ 
          $s_id = $_GET['return'];
          $fineReson =$_POST['fineReson'];
          $fine =$_POST['fine'];
          $sql = "UPDATE issued_books set returned_date = CURDATE(), returned_time = CURRENT_TIME(), fine_reson='$fineReson', fine=$fine where record_id =$s_id";  
            if(mysqli_query($con,$sql)){
                echo '
                <div class="alert alert-success alert-dismissible mt-2 mr-5 ml-5" role="alert">
                <strong> Success! &#128536; </strong>Record No '.$s_id.' has been returned Succesfully 
                <button onclick="shomd()" type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>  ';
            }
            else {
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> '.$sql.'"<br>" '. mysqli_error($con).' </strong> Cannot delete or update a parent row (foreign key constraint fails)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>  ';               
            
            }
            
            $sqlreturn="SELECT * FROM issued_books where record_id=$s_id";
            $result=mysqli_query($con,$sqlreturn);
            if(mysqli_num_rows($result) == 1){
                $row=mysqli_fetch_assoc($result);
                $returnSerial=$row['book_serial'];
                $sql5 ="UPDATE book_copies set status='available' WHERE book_serial='$returnSerial'";
                if(mysqli_query($con,$sql)){

                }
                }
        }
    ?>




<div class="row mt-5">
    <div class="col-md-3 col-sm-12 form-group pl-3 pr-3 pt-2">
    </div>

    <div class="col-md-6 col-sm-12  form-group  container">
        <div class="card">
            <h5 class="card-header bg-info" style="color:white">Issued Book Details</h5>
            <div class="card-body">


                <?php
                if (isset ($_GET['return'])){

                    $memberID=$_GET['return'];

                    $sql = $query ="select record_id, issued_books.book_serial, member_id, student.student_ininame, books.name,issued_date, issued_time, returned_date,returned_time, fine_reson, fine from issued_books 
                    INNER JOIN student
                    ON issued_books.member_id = student.student_id
                    INNER JOIN book_copies
                    ON issued_books.book_serial = book_copies.book_serial
                    INNER JOIN books 
                    ON book_copies.book_id=books.book_id
                where record_id ='$memberID'";

                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result) == 1){
                    $row=mysqli_fetch_assoc($result);
                    
                    echo '
                    <p class="card-text">Issue ID : <span style="color:red;">'.$row["record_id"].'</span> </p>
                    <p class="card-text">Member Name : <span style="color:red;">'.$row["student_ininame"].'</span> </p>
                    <p class="card-text">Member ID : <span style="color:red;">'.$row["member_id"].'</span> </p>
                    <p class="card-text">Book Name : <span style="color:red;">'.$row["name"].'</span> </p>
                    <p class="card-text">Serial : <span style="color:red;">'.$row["book_serial"].'</span> </p>
                    <p class="card-text">Book Issued Date : <span style="color:red;">'.$row["issued_date"].'</span> </p>
                    ';
                    }
                }
                ?>
                <form method="post">
                <p class="card-text">Fine Reson: </p>
                <input type="text" class="form-control" id="fine" name="fineReson" placeholder="Fine Reson" required="required">
                <p class="card-text  pt-3">Fine (in LKR) : </p>
                <input type="number" class="form-control" name="fine" id="fine" placeholder="Fine Amount" required="required">
                <button type="submit" class="btn btn-info mt-3" value="returnBtn" name="returnBtn">Return Book</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-12 form-group pl-3 pr-3 pt-2">
    </div>
</div>

<script>
function shomd(){ 
  window.location.href = 'ViewBooks.php';
} 
</script>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
