<!doctype html>
<html lang="en">
  <style>
    .bg
    {
      margin-left: 20%;
            margin-right: 19.5%;
            padding: 3%;
    }
    .tt{
       width:;
       height: 38px;
    }
    .txt{
        font-size:150%;
    }
    .h{
      text-align:center;
      background-color: #0275d8;
      height:75px;
      border-radius:8px;
      color:white;
    }
    .box{
      /* margin-top:3%;  */
      border: 5px solid #0275d8; 
      border-radius: 8px;
    }
    
    
    </style>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Student Off-Peak Request</title>
  </head>
  <body class="bg">
  <br><br>
  


    <form>
      <div class="col form-group  container p-3 mb-2 bg-light text-dark" >
    <h1 class="pt-2 h">Student Off-Peak Request</h1>
    <hr>
   
  <div class="form-row container box">
  
    <div class="col-4" >
    <br>
     
      <label for="text" class="txt" >Name of applicant :</label><br>
      <input type="text" class="form-control" placeholder="" disabled>
     
    </div>
    
    <div class="col-4" >
    <br>
    
    <label for="text" class="txt" >Registration No :</label><br>
    <input type="text" class="form-control" placeholder="" disabled>
    </div>
    
    <div class="col-4" >
    <br>
    
    <label for="text" class="txt"  >Department :</label><br>
    <input type="text" class="form-control" placeholder="" disabled>
    </div>
    
    <div class="col-4" >
    <br>
   <label for="text" class="txt"  >Contact No :</label><br>
    <input type="text" class="form-control" placeholder="">
    </div>
    

    <div class="col-4" >
    <br>
   <label for="date" class="txt"  >Date :</label><br>
    <input type="date" class="form-control" placeholder="">
    </div>
    <div class="col-4" >
    <br>
   <label for="date" class="txt"  >Time :</label><br>
    <input type="time" class="form-control" placeholder="">
    </div>

    <div class="col-12" >
    <br>
    <label for="exampleFormControlTextarea1" class="txt" >Reason for exit :</label><br>
    <textarea class="form-control form-control-lg " id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="col-2" >
    <br>
    
    <button type="button" class="btn btn-primary">Submit Request</button>
    
    
    <br> <br> <br>
    </div>
    <div class="col-1" style="width:65px;" >
    <br>
    <button type="button" class="btn btn-info">Clear</button>
    </div>
    <div class="col-1" >
    <br>
    <button type="button" class="btn btn-secondary">Cancel</button>
    </div>
    

  </div>
  </div>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>