<?php

if(isset($_POST['Department'])){
    $id = $_POST['Department'];
    $cid = $_POST['Course'];
   echo'     <tr>
        <th scope="row">1</th>
        <td>Depaertment#'.$id.'</td>
        <td>Course#'.$cid.'</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr> ';
}

?>