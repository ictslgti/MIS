<?php
$title="payment |SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- dont change -->

    <div class="shadow p-3 mb-s bg-white rounded">
        <h1 class="text-center display-3">SLGTI Student Payment Portal</h1> 
        
    </div>
      
    <?php
    
    
$student_id=$student_name=$student_profile_img =$payment_id=$pays_reason=$payment_note=$pays_amount=$payment_id=$pays_date=$department=null;


if(isset($_POST['Add'])){
    

//   if(!empty($_POST['student_id'])
//   && !empty($_POST['student_name'])
//   && !empty($_POST['pays_depatment'])
//   && !empty($_POST['payment_type'])
// && !empty($_POST['payment_reason'])
// && !empty($_POST['payment_qty'])
// && !empty($_POST['payment_note'])
// && !empty($_POST['payment_amount'])){
    

     echo $student_id=$_POST['student_id'];
     echo $pays_department=$_POST['pays_department'];
     echo $pays_reason=$_POST['payment_reason'];
     echo $pays_qty=$_POST['payment_qty'];
     echo $pays_note=$_POST['payment_note'];
     echo $pays_amount=$_POST['payment_amount'];
     echo $payment_type=$_POST['payment_type'];
     
     
      
      $sql="INSERT INTO `pays` (`student_id`,`payment_type`,`payment_reason`,`pays_note`,`pays_amount`,`pays_qty`,`pays_date`,`pays_department`) 
      VALUES ('$student_id','$payment_type','$pays_reason','$pays_note','$pays_amount','$pays_qty',CURDATE(),'$pays_department')";
        // $sql="INSERT INTO `pays`(`student_id`,`payment_reason`,`pays_note`,`pays_amount`,`pays_qty`,`pays_department`) 
        // VALUES ('$student_id','$pays_reason','$pays_note','$pays_amount','$pays_qty','$pays_department')";

    


if(mysqli_query($con,$sql)){
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>'.$student_id.'</strong> <h4 class="text-center display-3">PAID</h4> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>    
        ';
      }
      else{
        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'.$student_id.'</strong> echo "Error".$sql."<br>".mysqli_error($con);
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        ';


      }
    
}

?>

    <?php

if(isset($_POST['edit'])){
      $id=$_POST['edit'];
      $sql="SELECT student.student_id,student.student_fullname,student.student_profile_img, course.department_id from course,student where course.course_id=
      (select student_enroll.course_id from student_enroll where student_enroll.student_id='$id') && student.student_id = '$id'";
      

      $result=mysqli_query($con,$sql);
      if(mysqli_num_rows($result)==1){   
          $row=mysqli_fetch_assoc($result);
           $student_id=$row['student_id'];
           $student_name=$row['student_fullname'];
           $department=$row['department_id'];
           $student_profile_img=$row['student_profile_img'];
          
          
      }
      else{
        echo "Error".$sql."<br>".mysqli_error($con);
      }
  }

?>
    <!-- Search ID -->

<div class="container">

<br>
    <div class="row ">
        <div class="col-sm-6"> </div>
        <div class="col-sm-0"> </div>
        <div class="col-sm-6 " >

            <form method="POST" action="#" class="form-inline"> 
                <div class="input-group   ">
                    <div class="input-group-prepend ">
                        <div class="input-group-text "><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" name="edit" placeholder=" Student Username">
                </div>
                <div>
                
                <button type="submit" class="btn btn-primary text-right">Search </button>
            </form>

            <!-- <div class="input-group mb-3">
        <form method="GET">
            <input type="text" name="edit" class="form-control" placeholder="Search ID" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search ID</button> 
            </form>
            </div> -->

        </div>
    </div>
    <br>
    <form method="POST" action="#">
  
        <div class="row">
        <div class="col-sm-6"><?php if($student_profile_img!=null) { ?> <img src="<?php echo $student_profile_img; ?>"
                alt="..." width="150px" height="150px"> <?php }?><br>

            
                <div class="form-row"><br>
                    <div class="form-group col-md-12"><i class="fas fa-id-card-alt"></i>&nbsp;
                        <label for="inputEmail4">ID</label>
                        <input type="text" name="student_id" value="<?php echo  $student_id;?>"
                            class="form-control<?php  if(isset($_POST['Add']) && empty($_POST['student_id'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['student_id'])){echo ' is-valid';} ?>"
                            id="inputEmail4" placeholder="ID">
                    </div>
                    <div class="form-group col-md-12"><i class="fas fa-user"></i>&nbsp;
                        <label for="inputEmail4">Name</label>
                        <input type="text" value="<?php echo  $student_name; ?>" name="student_name"
                            class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['student_name'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['student_name'])){echo ' is-valid';} ?>" id="inputEmail4" placeholder="Name">
                    </div>
                    <div class="form-group col-md-12"><i class="fas fa-building"></i>&nbsp;
                        <label for="inputEmail4">Department</label>
                        <input type="Department" 
                            class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['pays_department'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['pays_department'])){echo ' is-valid';} ?>"" id="
                            inputEmail4" placeholder="Department" name="pays_department" value="<?php echo  $department;?>">
                    </div>
                </div>

           
        </div>
        <div class="col-sm-6">


            
        <br> <br> 
                <div class="form-row">

                    <div class="input-group mb-3 col-md-12">

                        <div class="input-group-prepend">
                        <br>
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas
                        fa-swatchbook"></i>&nbsp;Payment Type&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                        <select class="custom-select <?php  if(isset($_POST['Add']) && empty($_POST['payment_type'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['payment_type'])){echo ' is-valid';} ?> "
                            id="payment_type" name="payment_type" onchange="showpaymentreason(this.value)">
                            <option value="null" selected disabled>-- Select a Payment Type --</option>
                            <?php
                                $sql = "select DISTINCT payment_type from payment";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<option  value="'.$row["payment_type"].'" required>'.$row["payment_type"].'</option>';
                                    
                                }
                                }else{
                                    echo '<option value="null"   selected disabled>-- No Course --</option>';
                                }
                                
                                ?>
                                        </select>
                                        
                                </div>


                    <div class="input-group mb-3 col-md-12 ">
                        <div class="input-group-prepend">

                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas
        fa-swatchbook"></i>&nbsp;Payment Reason</label>
                        </div>
                        
                        <select class="custom-select  <?php  if(isset($_POST['Add']) && empty($_POST['payment_reason'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['payment_reason'])){echo ' is-valid';} ?>
                        " id="payment_reason" name="payment_reason">
                             <option value="null" selected disabled>-- Select a Payment Reason --</option>
                         </select>
                    </div>

                    <div class="form-group col-md-12"><i class="fas fa-th"></i>&nbsp;
                        <label for="text">Qty</label>
                        <input type="text" class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['payment_qty'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['payment_qty'])){echo ' is-valid';} ?>"
                            placeholder="Qty" name="payment_qty">
                    </div>
                    <div class="form-group col-md-12 "><i class="fas fa-sticky-note"></i>&nbsp;
                        <label for="inputEmail4">Note</label>
                        <input type="text" 
                        class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['payment_note'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['payment_note'])){echo ' is-valid';} ?>" 
                             placeholder="Note" name="payment_note">
                    </div>
                    <div class="form-group col-md-12"><i class="fas fa-coins"></i>&nbsp;
                        <label for="inputEmail4">Amount</label>
                        <input type="text"
                        class="form-control <?php  if(isset($_POST['Add']) && empty($_POST['payment_amount'])){echo ' is-invalid';}if(isset($_POST['Add']) && !empty($_POST['payment_amount'])){echo ' is-valid';} ?>"
                             placeholder="Amount" name="payment_amount">
                    </div>
                </div>
                <h2>
                <button type="submit" name="Add" value="Add" class="btn btn-primary btn-block">
                    <h1><i class="fab fa-amazon-pay"></i>&nbsp;
                </button> </h1>
                <button type="submit" value="reset" class="btn btn-secondary btn-sm" ><i class="fas
        fa-redo-alt"></i>&nbsp;Reset</button>&nbsp;
                <a href="index.php" button type="button" class="btn btn-danger btn-sm"><i class="fas
        fa-times"></i>&nbsp;Close</a> <div class="row">



        </div>
        <div class="col-sm-0">
        
           
            
        <div class="col-sm-12"> 
        

        <!-- <html>
	<head>
		
		<title>A simple calculator</title>
	</head>
	<body><h3>calculator </h3>
		<div id="container">
			<div id="calculator">
				<div id="result">
					<div id="history">
						<p id="history-value"></p>
					</div>
					<div id="output">
						<p id="output-value"></p>
					</div>
				</div>
				<div id="keyboard"> 
					<table class="table table-info">
						<tr class="table-primary">
							<td><button class="number" id="1">1&nbsp;&nbsp;</button></td>
							<td><button class="number" id="2">2&nbsp;&nbsp;</button></td>
							<td><button class="number" id="3">3&nbsp;&nbsp;</button></td>
							<td><button class="number" id="4">4&nbsp;&nbsp;</button></td>
							<td><button class="operator" id="+">+&nbsp;</button></td>
							<td> <button class="operator" id="/">&#247;&nbsp;</button></td>
						
						</tr>
						<tr class="table-secondary">
							<td><button class="number" id="5">5&nbsp;&nbsp;</button></td>
							<td><button class="number" id="6">6&nbsp;&nbsp;</button></td>
							<td><button class="number" id="7">7&nbsp;&nbsp;</button></td>
							<td><button class="number" id="8">8&nbsp;&nbsp;</button></td>
							<td><button class="operator" id="-">-&nbsp;&nbsp;</button></td>
							<td><button class="operator" id="%">%</button>
						</tr class="table-success">
					
                        
                       
                        

						<tr>
						<td><button class="number" id="9">9&nbsp;&nbsp;</button></td>
					    <td><button class="number" id="0">0&nbsp;&nbsp;</button></td>
						<td><button class="operator" id="clear">C&nbsp;</button></td>
					    <td><button class="operator" id="backspace">CE</button></td>
                        <td><button class="operator" id="*">&times;&nbsp;</button></td>
                        <td><button class="operator" id="=">=&nbsp;</button></td>
					</tr>
					
					</table>
					
					
					
					
					
					
				</div>
			</div>
		</div>
		<script>
			function getHistory(){
	return document.getElementById("history-value").innerText;
}
function printHistory(num){
	document.getElementById("history-value").innerText=num;
}
function getOutput(){
	return document.getElementById("output-value").innerText;
}
function printOutput(num){
	if(num==""){
		document.getElementById("output-value").innerText=num;
	}
	else{
		document.getElementById("output-value").innerText=getFormattedNumber(num);
	}	
}
function getFormattedNumber(num){
	if(num=="-"){
		return "";
	}
	var n = Number(num);
	var value = n.toLocaleString("en");
	return value;
}
function reverseNumberFormat(num){
	return Number(num.replace(/,/g,''));
}
var operator = document.getElementsByClassName("operator");
for(var i =0;i<operator.length;i++){
	operator[i].addEventListener('click',function(){
		if(this.id=="clear"){
			printHistory("");
			printOutput("");
		}
		else if(this.id=="backspace"){
			var output=reverseNumberFormat(getOutput()).toString();
			if(output){//if output has a value
				output= output.substr(0,output.length-1);
				printOutput(output);
			}
		}
		else{
			var output=getOutput();
			var history=getHistory();
			if(output==""&&history!=""){
				if(isNaN(history[history.length-1])){
					history= history.substr(0,history.length-1);
				}
			}
			if(output!="" || history!=""){
				output= output==""?output:reverseNumberFormat(output);
				history=history+output;
				if(this.id=="="){
					var result=eval(history);
					printOutput(result);
					printHistory("");
				}
				else{
					history=history+this.id;
					printHistory(history);
					printOutput("");
				}
			}
		}
		
	});
}
var number = document.getElementsByClassName("number");
for(var i =0;i<number.length;i++){
	number[i].addEventListener('click',function(){
		var output=reverseNumberFormat(getOutput());
		if(output!=NaN){ //if output is a number
			output=output+this.id;
			printOutput(output);
		}
	});
}
		</script>
	</body>
</html>









        </div>
        </div>
        </div>
        <br>
    </form>
    </div> -->
    </div>


    <div class="row">
        <div class="col-sm-4">

        </div>
        

    <div class="row">
        <div class="col-sm-4">




        </div>
        <!--
-------------------------------------------------------------------------------------------------------------------------------
--------------------------------------- -->
        <div class="col-sm-4">


        </div>
        <div class="col-sm-4">


        </div>
        <!-- colom3........start -->
        <div class="col-sm-4">

        </div>
        <!-- colom3........ end -->
    </div>
    <br>
    </div>
    <!-- dont change -->
    

</div>
</div>

<script>
function showpaymentreason(val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("payment_reason").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "controller/getPaymentReason", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("payment_type=" + val);
}
</script>
<!-- dont change -->
<?php
    include_once("footer.php");
    ?>
</body>

</html>
