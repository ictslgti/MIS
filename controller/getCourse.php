<?php
if(isset($_POST['department'])){
    $id = $_POST['department'];
    echo '<option value="null"   selected disabled>--Select Course--</option>';
    echo '<option value="C1" >Department '.$id.' Course 1</option>';
    echo '<option value="C2">Department '.$id.' Course 2</option>';
    echo '<option value="C3">Department '.$id.' Course 3</option>';
    echo '<option value="C4">Department '.$id.' Course 4</option>';
    echo '<option value="C5">Department '.$id.' Course 5</option>';
}

?>