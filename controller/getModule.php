<?php
if(isset($_POST['course'])){
    $id = $_POST['course'];
    echo '<option value="null"  selected disabled>--Select Module--</option>';
    echo '<option value="M1">Course '.$id.' Module 1</option>';
    echo '<option value="M2">Course '.$id.' Module 2</option>';
    echo '<option value="M3">Course '.$id.' Module 3</option>';
    echo '<option value="M4">Course '.$id.' Module 4</option>';
    echo '<option value="M5">Course '.$id.' Module 5</option>';

}

?>