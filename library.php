<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="card-deck ml-5 mr-5 pt-4">
  <div class="card">
    <img src="img/library_25.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Books Listed</h5>
      <p class="h1">2836</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img src="img/library_25.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Times Book Issued</h5>
      <p class="h1">221</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img src="img/library_25.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Overtimed Borrows</h5>
      <p class="h1">03</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
</div>

<div class="card-deck pt-5 pl-3 pr-3">
<a href="library.php" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-primary" style="max-height: 14rem;">
  <div class="card-header"><b>Add Book</b></div>
    <div class="card-body">
      <p class="card-text">By clicking here you can add new books and their copies to the libarary.</p>
      <a class="btn btn-light mt-3" href="AddBook.php" role="button">Add Book</a>
      
    </div>
</a>
  </div>
  <a href="url" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-success" style="max-height: 14rem;">
  <div class="card-header">Issue Book</div>
    <div class="card-body">
      <p class="card-text">You can Issue a book to a member here. But issue only one book per member at a time.</p>
      <a class="btn btn-light mt-3" href="IssueBook.php" role="button">Issue Here</a>
    </div>
    </a>
  </div>
  <a href="url" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-secondary" style="max-height: 14rem;">
  <div class="card-header">Manage Issued books</div>
    <div class="card-body">
      <p class="card-text">Return borrowed books here and able to add fine also. able to extend the borrow period.</p>
      <a class="btn btn-light mt-3" href="returnBook.php" role="button">Issued books</a>
    </div>
    </a>
  </div>

  <a href="url" class="text-white" style ="text-decoration: none">
  <div class="card text-white bg-info" style="max-height: 14rem;">
  <div class="card-header">Manage books</div>
    <div class="card-body">
      <p class="card-text">View all the books and their copies there are available in this library. And also able to edit.</p>
      <a class="btn btn-light mt-3" href="#" role="button">Manage books</a>
    </div>
    </a>
  </div>
</div>
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
