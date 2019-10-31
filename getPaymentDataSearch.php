
<!-- print entries from database using PHP -->
<?php
 include_once("config.php");
          //if any button clicked get the button value in a variable 
               if(isset($_POST['text'])){
                    $postchar = $_POST['text'];
                    //echo $postchar;
                    //multiply the id value by 10 to set SQL OFFSET value 
                    $query= "select * from pays where pays_id = '$postchar' or student_id = '$postchar' or payment_type = '$postchar' or payment_reason = '$postchar' or pays_date = '$postchar' or pays_department = '$postchar'";               
                     //$query ="SELECT * FROM books LIMIT 10 OFFSET $postchar";
                }
               
                $result = mysqli_query($con, $query);
                //if (mysqli_num_rows($result)!=0){
                     while($row = mysqli_fetch_array($result)){  
                          echo '  
                               <tr>  
                                    <td>'.$row['pays_id'].'</td>
                                    <td>'.$row['student_id'].'</td>
                                    <td>'.$row['payment_type'].'</td>
                                    <td>'.$row['payment_reason'].'</td>
                                    <td>'.$row['pays_note'].'</td>
                                    <td>'.$row['pays_amount'].'</td>
                                    <td>'.$row['pays_qty'].'</td>
                                    <td>'.$row['pays_date'].'</td>
                                    <td>'.$row['pays_department'].'</td>
                                    <td> <a href="Update_Payment.php ?upt='.$row["pays_id"].'" >
                                    <button type="button" class="btn btn-outline-info rounded-pill  waves-effect  ">
                                    <i class="far fa-edit"></i>
                                    </button></a> </td>
                               </tr>
                               ';  
                     }
                    //} else { echo "NO RESULT FOUND";} 
          ?>   