<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
 $title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<!-- INSERT BOOK DETAILS TO THE DATABASE -->
<?php
            if(isset($_POST['Add'])){
                if(!empty($_POST['bookName']))    
                    {

                    

                        $lastNumber=null;
                        $thisYear=date("Y");
                        $bookSerialNo=null;
                   
                        $sql1="SELECT SUBSTRING((SELECT book_id FROM books ORDER BY book_id DESC LIMIT 1) FROM 16) AS lastNumber";
                        $result=mysqli_query($con,$sql1);
                        if(mysqli_num_rows($result) == 1)
                        {
                             $row=mysqli_fetch_assoc($result);
                             $lastNumber=$row["lastNumber"];
                             $intLastNumber =  (integer)$lastNumber+1;
                             $bookSerialNo = "slgti/lib/".$thisYear."/".$intLastNumber;         
                        }

                    $bookName=$_POST['bookName'];
                    $authorName=$_POST['authorName'];
                    $pubName=$_POST['pubName'];
                    $isbn=$_POST['isbn'];
                    $category=$_POST['category'];
                    $yearPub=$_POST['yearPub'];
                    $cost=$_POST['cost'];
                    $datePic=$_POST['datePic'];


                    $sql="INSERT INTO `books` (`book_id`, `name`, `author`, `publisher`, `ISBN`, `category`, `Year`, `Cost`, `Purch_Date`) VALUES ('$bookSerialNo', '$bookName', '$authorName', '$pubName', '$isbn', '$category', '$yearPub', '$cost', '$datePic')";
                    if(mysqli_query($con,$sql))
                    {
                        echo '<div class="alert alert-success alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Sucess &#128512; </strong>
                        New Book Added Sucessfuly!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hbook_idden="true">&times;</span>
                        </button>
                      </div>';
                    }
                    else{
                        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);

                        echo '<div class="alert alert-danger alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Fail &#128557; </strong>
                        Book Adding Failed! <br> '. $sql .' "<br>" '. mysqli_error($con).'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    }   
                }else{
                    echo "manda paththiram";
                }
            }
?>

<!-- UPDATE -->
<?php
    if(isset($_POST['update'])){
        
        $bookIdUpdate=$_GET['bookIdEdit'];

        $bookName=$_POST['bookName'];
        $authorName=$_POST['authorName'];
        $pubName=$_POST['pubName'];
        $isbn=$_POST['isbn'];
        $category=$_POST['category'];
        $yearPub=$_POST['yearPub'];
        $cost=$_POST['cost'];
        $datePic=$_POST['datePic'];

        $sql="UPDATE books SET
        name='$bookName',
        author='$authorName',
        publisher='$pubName',
        ISBN='$isbn',
        category='$category',
        year=$yearPub,
        cost=$cost,
        purch_date='$datePic'
        WHERE book_id = '$bookIdUpdate' 

        "; 

        if(mysqli_query($con,$sql)){
            echo '<div class="alert alert-success alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Sucess &#128512; </strong>
            Details Updated Sucessfuly!
            <button onclick="shomd()" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else{echo '<div class="alert alert-danger alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Fail &#128557; </strong>
            Sorry Update Failed! <br> '. $sql .' "<br>" '. mysqli_error($con).'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>';}
    }
?>


<?php
            if(isset($_POST['addCopy'])){
                $bookStatus=$_POST['bookSerials'];
                if ($bookStatus!="No Book Found"){
                if(!empty($_POST['bookSerial']))    
                    {

                    $lastNumber=null;
                    $thisBook=$_POST['bookSerials'];;
                    $bookSerialNo=null;

                    $sql1="SELECT count(book_id) AS lastNumber FROM book_copies WHERE book_id='$thisBook'";
                    $result=mysqli_query($con,$sql1);
                    if(mysqli_num_rows($result) == 1)
                    {
                        $row=mysqli_fetch_assoc($result);
                        $lastNumber=$row["lastNumber"];
                        $intLastNumber =  (integer)$lastNumber+1;
                        $bookSerialNo = $thisBook."/".$intLastNumber;         
                    }
                        

                    $bookSerialCopy=$_POST['bookSerial'];
                    $datePick=$_POST['datePick'];


                    $sql="INSERT INTO `book_copies` (`book_serial`, `book_id`, `date`) VALUES ('$bookSerialNo', '$bookSerialCopy', '$datePick')";
                    if(mysqli_query($con,$sql))
                    {
                        echo '<div class="alert alert-success alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Sucess &#128512; </strong>
                        New Copy Added Sucessfuly!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    }
                    else{
                        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);

                        echo '<div class="alert alert-danger alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Fail &#128557; </strong>
                        Copy Adding Failed! <br> '. $sql .' "<br>" '. mysqli_error($con).'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    }   
                }else{
                    echo "manda paththiram";
                }
            }else {
                echo '<div class="alert alert-danger alert-dismissible mt-2 mr-5 ml-5" role="alert">  <strong>Fail &#129324; </strong>
                        Book Serial Is Wrong!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }
        }
        ?>



<form method="POST">
            <div class="row border rounded-lg border-info mr-5 ml-5 mt-5 mb-5">
            <div class="col-md-12 col-sm-12  form-group  container bg-info">
                <h2  class="pt-2" style="color:white">Book info <a data-toggle="modal" href="#myModal" class="btn btn btn-success float-right"><strong>ADD COPY OF A BOOK</strong></a> </h2>
              </div>
              <div class="w-100"></div>

            <?php
            if (isset($_GET['bookIdEdit'])){
                $bookIdEdit=$_GET['bookIdEdit'];
                $sqlquary="SELECT * FROM books WHERE book_id='$bookIdEdit'";
                $result=mysqli_query($con,$sqlquary);
                if(mysqli_num_rows($result) == 1){
                    $row=mysqli_fetch_assoc($result);
                    $name=$row["name"];
                    $author=$row["author"];
                    $publisher=$row["publisher"];
                    $ISBN=$row["ISBN"];
                    $category=$row["category"];
                    $year=$row["year"];
                    $cost=$row["cost"];
                    $purch_date=$row["purch_date"];
                    echo'
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="bookName">01. Book Name</label> <span style="color:red;">*</span></label>
                      <input type="text" value="'.$name.'" class="form-control"  name="bookName" aria-describedby="bookNameHelp" placeholder="Book Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the book appeared on front cover.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="authorName">02. Author Name</label> <span style="color:red;">*</span></label>
                      <input type="text" value="'.$author.'" class="form-control" name="authorName" aria-describedby="authorNameHelp" placeholder="Author Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the the person who written the book.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="pubName">03. Publisher Name</label> <span style="color:red;">*</span></label>
                  <input type="text" value="'.$publisher.'" class="form-control" name="pubName" aria-describedby="pubNameHelp" placeholder="Publisher Name" required="required">
                  <small id="pubNameHelp" class="form-text text-muted">Name of the publishing company or individual.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="isbn">04. ISBN</label>
                  <input type="number" value="'.$ISBN.'" class="form-control" name="isbn" aria-describedby="isbnHelp" placeholder="ISBN">
                  <small id="isbnHelp" class="form-text text-muted">ISBN Number of the book. If no ISBN let be empty</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="category">05. Book Category</label> <span style="color:red;">*</span></label>
                  
                  <select class="form-control" value="'.$category.'" name="category">
                      <option value="ict">ICT</option>
                      <option value="construction">Construction</option>
                      <option value="mechanical">Mechanical</option>
                      <option value="autoMobile">Auto Mobile</option>
                      <option value="food">Food Tech</option>
                      <option value="electronic">Electronic</option>
                      <option value="common">Common</option>
                    </select>
                  <small id="pubNameHelp" class="form-text text-muted">Chose acategory from dropdown menu.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="yearPub">06. Year of publication</label> <span style="color:red;">*</span></label>
                  <input type="number" value="'.$year.'" class="form-control" name="yearPub" aria-describedby="yearPubHelp" placeholder="Year" required="required">
                  <small id="yearPubHelp" class="form-text text-muted">Input the year of first publication</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="cost">07. Book Cost</label> <span style="color:red;">*</span></label>
                  <input type="number" value="'.$cost.'" class="form-control" name="cost" aria-describedby="costHelp" placeholder="Book Cost" required="required">
                  <small id="costHelp" class="form-text text-muted">Retail price of the book.</small>

          </div>
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="datePic">08. Purchesed Date</label> <span style="color:red;">*</span></label>
                  <input type="date" value="'.$purch_date.'" class="form-control" name="datePic" aria-describedby="datePicHelp" required="required">
                  <small id="datePicHelp" class="form-text text-muted">Purchesed Date or donated date.</small>
                  <a href="ViewBooks.php" class=" ml-2 mt-2 btn btn-danger float-right"><strong>BACK</strong></a>                 
                <button type="submit" class="btn btn-info mt-2 float-right" value="update" name="update"><strong>UPDATE</strong></button>
            </div>';
            }}else{
                echo'
                <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="bookName">01. Book Name</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control"  name="bookName" aria-describedby="bookNameHelp" placeholder="Book Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the book appeared on front cover.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold" for="authorName">02. Author Name</label> <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" name="authorName" aria-describedby="authorNameHelp" placeholder="Author Name" required="required">
                      <small id="bookNameHelp" class="form-text text-muted">Name of the the person who written the book.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="pubName">03. Publisher Name</label> <span style="color:red;">*</span></label>
                  <input type="text"class="form-control" name="pubName" aria-describedby="pubNameHelp" placeholder="Publisher Name" required="required">
                  <small id="pubNameHelp" class="form-text text-muted">Name of the publishing company or individual.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="isbn">04. ISBN</label>
                  <input type="number" class="form-control" name="isbn" aria-describedby="isbnHelp" placeholder="ISBN">
                  <small id="isbnHelp" class="form-text text-muted">ISBN Number of the book. If no ISBN let be empty</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="category">05. Book Category</label> <span style="color:red;">*</span></label>
                  
                  <select class="form-control" name="category">
                      <option value="ict">ICT</option>
                      <option value="construction">Construction</option>
                      <option value="mechanical">Mechanical</option>
                      <option value="autoMobile">Auto Mobile</option>
                      <option value="food">Food Tech</option>
                      <option value="electronic">Electronic</option>
                      <option value="common">Common</option>
                    </select>
                  <small id="pubNameHelp" class="form-text text-muted">Chose acategory from dropdown menu.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="yearPub">06. Year of publication</label> <span style="color:red;">*</span></label>
                  <input type="number"  class="form-control" name="yearPub" aria-describedby="yearPubHelp" placeholder="Year" required="required">
                  <small id="yearPubHelp" class="form-text text-muted">Input the year of first publication</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="cost">07. Book Cost</label> <span style="color:red;">*</span></label>
                  <input type="number"  class="form-control" name="cost" aria-describedby="costHelp" placeholder="Book Cost" required="required">
                  <small id="costHelp" class="form-text text-muted">Retail price of the book.</small>

          </div>
          <div class="col-md-6 col-sm-12 form-group pl-3 pr-3">
                  <label class="font-weight-bold" for="datePic">08. Purchesed Date</label> <span style="color:red;">*</span></label>
                  <input type="date" class="form-control" name="datePic" aria-describedby="datePicHelp" required="required">
                  <small id="datePicHelp" class="form-text text-muted">Purchesed Date or donated date.</small>

                  <input class="btn btn-dark ml-2 mt-2 float-right" type="reset" value="Reset">
                <button type="submit" class="btn btn-info mt-2 float-right" value="Add" name="Add">Add Book</button>
            </div>
                ';
            }
            ?>
            </div>     
      </form>


  <!-- Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal" role="dialog">
  <div class=" mt-3 modal-dialog modal-xl">
    <div class="modal-content">
    <div>
<form method ="POST">
<div class=" rounded-top bg-info mr-5 ml-5 mt-5 ">
            <i class="ml-2 mr-2 mb-2 text-light fas fa-lg fa-book-medical" ></i>  
            <a class="navbar-brand text-white font-weight-bold">Add Book Copy</a>                   
        </div>
        <div class="row border rounded-bottom border-info mr-5 ml-5 mb-5">
              <div class="w-100"></div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                      <label class="font-weight-bold"  for="bookName">01. Book ID</label><span style="color:red;"> *</span>
                      <input value="<?php
                      if (isset($_GET['bookIdEdit'])){
                        $bookIdEdit=$_GET['bookIdEdit'];
                        echo $bookIdEdit;
                        }
                      ?>" type="text" class="form-control" name="bookSerial" id="bookSerial" name="bookSerial"  onfocusout="showName()" aria-describedby="bookSerialHelp" placeholder="Book ID" required="required">
                      <small id="bookSerialHelp" class="form-text text-muted">Type the serial number of the book located on back side.</small>
              </div>
              <div class="col-md-6 col-sm-12 form-group pl-3 pr-3 pt-2">
                    <label class="font-weight-bold" for="datePic">02. Purchesed Date</label> <span style="color:red;">*</span>
                    <input type="date" class="form-control" onclick="showName()" name="datePick" aria-describedby="datePicHelp" required="required">
                    <small id="datePicHelp" class="form-text text-muted">Purchesed Date or donated date.</small>
              </div>
              <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                      <input readonly type="text" class="form-control" name="bookSerials" id="bookSerials" name="bookSerials"  aria-describedby="bookSerialHelp" placeholder="Name of the book will apper here" required="required">
                      <small id="bookSerialHelp" class="form-text text-muted">Book name of the serial number you're entered.</small>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12 col-sm-12 form-group pl-3 pr-3">
                <input class="btn btn-dark ml-2 mt-1 float-right" type="reset" value="Reset">
                <button type="submit" class="btn btn-info mt-1 float-right" value="addCopy" name="addCopy">Add Copy</button>
                <button  type="button" class="float-left mb-1 ml-2 mt-1 btn btn-danger" data-dismiss="modal"><i class="text-light fas fa-lg fa-arrow-alt-circle-left" ></i></button>
            </div>

            </div>
            </form>
            </div>
    </div>
  </div> 
  <script>
function showName(){
        //call ajax
        var ajax = new XMLHttpRequest();

        ajax.open("POST", "controller/getBookNameUpdate", true);

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
                        document.getElementById("bookSerials").value = this.responseText;
                        //document.write(this.responseText);
                }
        }
}

function shomd(){ 
  window.location.href = 'library_books.php';
} 
</script>
   
</div>


<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
