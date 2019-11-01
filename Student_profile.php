<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<!-- form start---->
<div>
<h1 style="text-align:center" class="col text-center shadow p-5 mb-5 bg-white rounded" > SLGTI Student Profile  </h1>
</div>

<div class="container">
<form method="POST">

<div class="form-row shadow p-2 mb-4 bg-white rounded">
    <div class="col-md-3 mb-3 " > 
    <img src="img/user.png" alt="..." class="img-thumbnail" style="width:200px;height:200px;">
    <!-- <button type="button" class="btn btn-outline-success">Success</button> -->
    </div>
    <div class="col-md-7 col-sm-4">
        <h5 class="text-muted"><b>Miss.Ravinthiran.Thanujah</b></h5>
        <h6 class="text-muted">2017/ICT/BIT-06</h6>
        <h6 class="text-muted"> Department of Information & Communication Technology</h6>
        <h6 class="text-muted"> National Diploma in Information & Communication Technology</h6>
        <p class="text-muted" style="font-size:15px;"> (NVQ-05) </P>
        <h6 class="text-muted">Batch: 2017/2018 (1ST NOVEMBER 2018)</h6>
        <!-- <div class="form-row">
        <div class="col-md-5 col-sm-4"></div>
        <div class="col-md-5 col-sm-4"><h5 class="text-muted" style="flot:left">2018 November 01</h5></div> 
        </div> -->
    </div>
    <!-- <div class="col-md-4 col-sm-4 shadow p-3 mb-5 bg-white rounded">
    <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    </div> -->
</div>

<div class="form-row">
    <div class="col-md mb-3 border border-success" style="width:1200px;height:100px;"> 
    <nav>
     <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
     </div>
    </nav>
     <div class="tab-content" id="nav-tabContent">
     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
     <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div>
</div>

</form>
</div>

<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>