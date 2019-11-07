
<!-- print entries from database using PHP -->
<?php
 include_once("config.php");
          //if any button clicked get the button value in a variable 
               if(isset($_POST['text'])){
                    $postchar = $_POST['text'];
                    //echo $postchar;
                    //multiply the id value by 10 to set SQL OFFSET value 
                    $query ="select record_id, issued_books.book_serial, member_id, student.student_ininame, books.name,issued_date, issued_time, returned_date,returned_time, fine_reson, fine from issued_books 
                    INNER JOIN student
                    ON issued_books.member_id = student.student_id
                    INNER JOIN book_copies
                    ON issued_books.book_serial = book_copies.book_serial
                    INNER JOIN books 
                    ON book_copies.book_id=books.book_id
                    where issued_books.member_id like '%$postchar%' or issued_books.book_serial like '%$postchar%' or issued_books.issued_date like '%$postchar%'";               
                     //$query ="SELECT * FROM books LIMIT 10 OFFSET $postchar";
                } 
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)!=0){
                     while($row = mysqli_fetch_array($result)){  
                          echo '  
                               <tr>  
                                    <td>'.$row["record_id"].'</td>  
                                    <td>'.$row["member_id"].'</td>
                                    <td>'.$row["student_ininame"].'</td>   
                                    <td>'.$row["book_serial"].'</td>   
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["issued_date"].'</td>  
                                    <td>'.$row["issued_time"].'</td>
                                    <td>'.$row["returned_date"].'</td>  
                                    <td>'.$row["returned_time"].'</td>  
                                    <td>'.$row["fine_reson"].'</td>  
                                    <td>'.$row["fine"].'</td>
                                    <td>
                                       
                                        <button class="btn btn-sm btn-danger" data-href="?delete_id='.$row["record_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button> 
                                        <a href="AddStudentFeedback.php?edit='. $row["record_id"].'" class="btn btn-sm btn-success"><i class=" text-light far fa-calendar-check" ></i></a>
                                    </td>
                               </tr>
                               ';  
                     }} else { echo "NO RESULT FOUND";} 
          ?>   