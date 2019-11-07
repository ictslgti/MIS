<?php
$bookName = null;

if (isset($_POST['id'])){

$postchar = $_POST['id'];

if($postchar!=""){

include_once("config.php");

$sql ="select name from books where book_id ='$postchar'";

if($result=mysqli_query($con,$sql)){

    if(mysqli_num_rows($result) == 1)
    {
        $row=mysqli_fetch_assoc($result);
        $bookName=$row["name"];
        echo $bookName;
    }
    else {
        echo "No Book Found";
    }
}else  {echo "No Book Found";}

}
}
    ?>