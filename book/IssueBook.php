<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "book | SLGTI";
include_once("../config.php"); 
include_once("../head.php"); 
include_once("../menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<form method ="POST">
        <div class="row border rounded-lg border-info mr-5 ml-5 mt-5 mb-5">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
            <h2  class="pt-2" style="color:white">Issue Book</h2>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold"  for="bookName">01. Book Serial</label>
                      <input type="text" class="form-control" name="bookSerial" id="bookSerial" name="bookSerial"  onfocusout="showName()" aria-describedby="bookSerialHelp" placeholder="Book Serial">
                      <small id="bookSerialHelp" class="form-text text-muted">Type the serial number of the book located on back side.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="authorName">02. Member ID</label>
                      <input type="text" class="form-control" id="memberID" aria-describedby="memberIDHelp" name="memberID" placeholder="Member ID">
                      <small id="memberIDHelp" class="form-text text-muted">ID of borrower.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                      <input type="text" class="form-control" id="bookName" name="bookName" aria-describedby="bookNameHelp" placeholder="Name of the book will apper here" disabled>
                      <small id="bookNameHelp" class="form-text text-muted">Book name of the serial number you're entered.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
                <button type="button" name="issue" class="btn btn-info mt-2 float-right" data-toggle="modal" data-target="#exampleModal">Issue Book</button>
            </div>

            </div>


            <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Issue Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                        Are You Sure?
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-info float-right" value="Add" name="Add" data-toggle="modal" data-target="#exampleModalCenter">Issue Book</button>

                </div>
                </div>
                </div>
        </div>
      </form>


        


      <!-- INSERT ISSUE DETAILS TO THE DATABASE -->

      <?php
            if(isset($_POST['Add'])){
                if(!empty($_POST['bookSerial'])&&!empty($_POST['memberID'])){
                    $bookID=$_POST['bookSerial'];
                    $memberID=$_POST['memberID'];    
                        $queary="SELECT status, copy_delete FROM book_copies WHERE book_serial='$bookID'";
                        $result=mysqli_query($con,$queary);
                        if(mysqli_num_rows($result) == 1){
                        $row=mysqli_fetch_assoc($result);
                        $status=$row["status"];
                        $delStatus=$row["copy_delete"];
                        if ($status=="available" &&  $delStatus=="notdeleted"){
                            $sql="INSERT INTO `issued_books` (`record_id`, `member_id`, `book_serial`, `issued_date`, `issued_time`, `returned_date`, `returned_time`, `fine_reson`, `fine`) 
                                VALUES (NULL, '$memberID', '$bookID', CURDATE(),  CURRENT_TIME(), NULL, NULL, NULL, NULL)";
                        if(mysqli_query($con,$sql)){
                                echo '<div class="alert alert-success alert-dismissible  mr-5 ml-5" role="alert">  <strong>Sucess &#128512; </strong>
                                Book Issued Sucessfuly!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                        }
                         else{
                                echo '<div class="alert alert-danger alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Fail &#128557; </strong>
                                Book Issuing Failed! <br> '. $sql .' "<br>" '. mysqli_error($con).'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                        }
                    
                        $sql2="UPDATE book_copies
                        SET status='notavailable'
                        WHERE book_serial = '$bookID';                   
                        ";
                    
                        if(mysqli_query($con,$sql2)){
                        }
                                
                        }else{ echo '<div class="alert alert-danger alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Warning! &#128557; </strong>
                                Barrow Failed! Book Not Available To Barrow.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>';}
                        }
                }else{echo "manda paththiram";}                
            }

        ?>


      <script>
function showName(){
        //call ajax
        var ajax = new XMLHttpRequest();

        ajax.open("POST", "controller/getBookName", true);

        //sending ajax request
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var serial = document.getElementById('bookSerial').value;
        ajax.send("id="+serial);
        //ajax.send("id=1");

        //reciving responce from data.php
        ajax.onreadystatechange = function()
        {
                if (this.readyState == 4 && this.status == 200)
                {
                        document.getElementById("bookName").value = this.responseText;
                        //document.write(this.responseText);
                }
        }
}
</script>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
