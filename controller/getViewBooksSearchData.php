
<!-- print entries from database using PHP -->
<?php
 include_once("config.php");
          //if any button clicked get the button value in a variable 
               if(isset($_POST['text'])){
                    $postchar = $_POST['text'];
                    //echo $postchar;
                    //multiply the id value by 10 to set SQL OFFSET value 
                    $query= "SELECT books.book_id,books.name, books.author, books.publisher, books.ISBN, books.category, books.year, books.cost, books.purch_date, COUNT(book_copies.book_serial) AS copies FROM books LEFT JOIN book_copies on books.book_id=book_copies.book_id where books.name like '%$postchar%' or books.book_id like '%$postchar%' or books.author like '%$postchar%' GROUP BY book_id";               
                     //$query ="SELECT * FROM books LIMIT 10 OFFSET $postchar";
                }
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)!=0){
                    $number=1;
                    while($row = mysqli_fetch_array($result)){  
                         echo '  
                              <tr>  
                                   <td>'.$number.'</td>
                                   <td>'.$row["book_id"].'</td>  
                                   <td>'.$row["name"].'</td>  
                                   <td>'.$row["author"].'</td>  
                                   <td>'.$row["publisher"].'</td>  
                                   <td>'.$row["ISBN"].'</td>
                                   <td>'.$row["category"].'</td>  
                                   <td>'.$row["year"].'</td>  
                                   <td>'.$row["cost"].'</td>  
                                   <td>'.$row["purch_date"].'</td>  
                                   <td>'.$row["copies"].'</td>
                                   <td>
                                   <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["book_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
                                   <a href="addBook.php?bookIdEdit='. $row["book_id"].'" class="btn btn-sm btn-success"><i class=" text-light fas fa-edit" ></i></a>
                                   <button  onclick="viewCopies(this.id)" class="btn btn-sm btn-warning" id="'.$row["book_id"].'" data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"></i> </button> 
                                   </td>
                              </tr>
                              ';
                              $number=$number+1;  
                     }} else { echo "NO RESULT FOUND";} 
          ?>   