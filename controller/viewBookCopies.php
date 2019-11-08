
<!-- print entries from database using PHP -->

<?php
 include_once("config.php");
    if(isset($_POST['delete_id'])){
        $bookID=$_POST['delete_id'];
        $query ="SELECT book_serial, date, status from book_copies WHERE book_id = '$bookID' AND copy_delete='notdeleted'";
        
        $result = mysqli_query($con, $query);
        $counter=1;
        while($row = mysqli_fetch_array($result)){  
            echo '  
                    <tr>  
                        <td>'.$counter.'</td>
                        <td>'.$row["book_serial"].'</td>
                        <td>'.$row["date"].'</td> 
                        <td>'.$row["status"].'</td>  
                        <td>
                            <button class="btn btn-sm btn-danger" data-href="?deleteCopy_id='.$row["book_serial"].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i> </button>
                        </td>
                    </tr>
                    '; 
                    $counter=$counter+1; 
            }
        }
               ?>