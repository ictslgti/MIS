<?php
include_once("../config.php");
if(isset($_POST['payment_type'])){
    $id = $_POST['payment_type'];
    echo '<option value="null"  selected disabled>--Select type--</option>';
    $sql = "SELECT * from payment WHERE payment_type='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo '<option  value="'.$row["payment_reason"].'" required>'.$row["payment_reason"].'</option>';
        }
    }else{
        echo '<option value="null"   selected disabled>-- No reason --</option>';
    }

}




?>