<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="card text-light bg-dark text-center">
            <div class="card-header text-center"> Registered Students <a href="" class="btn btn-primary btn-sm">View</a>
            </div>
            <div class="card-body">
                <h1 class="display-4 "><i class="fa fa-user-graduate text-light"></i>1235</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                aria-valuemax="100">25%</div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
    </div>
</div>

<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->