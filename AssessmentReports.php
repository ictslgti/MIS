<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<form>
  <div class="table container " id="printableArea" style="width: 270mm">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Course</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option>ICT</option>
        <option>Food</option>
        <option>Mechanical</option>
        <option>Construction</option>
        <option>Electrical</option>
        <option>Auto mobile</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Academic Year</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
        <option>2019</option>
        <option>2020</option>
        <option>2021</option>
      </select>

    </div>

    <div>
      <button type="button" class="btn btn-primary">Primary</button>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="table container border border-dark" id="printableArea" style="width: 270mm">

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Studend Name</th>
          <th scope="col">Student ID</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
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
        </tr>
      </tbody>
    </table>
  </div>



  <!--END OF YOUR COD-->

  <!--BLOCK#3 START DON'T CHANGE THE ORDER-->
  <?php include_once("footer.php"); ?>
  <!--END DON'T CHANGE THE ORDER-->