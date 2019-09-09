<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<h1 class="display-2"><em>EAT GOOD FEEL GOOD</em></h1>

 <!-- FOOD MENU DESIGN    -->

<div class="container-fluid"> 
     <div class="row">
        <div class="col-12">
            <h1 class="h1">Food Menu</h1>
            <p> Foods very Testy and best quality</p>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col container">
                <div class="card" style="width:80%;Height:60% ;margin-top:3%;">
                    <img class="card-img-top" src="img/123.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Monday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col container">
                <div class="card" style="width:80%;Height:60%;margin-top:3%;">
                    <img class="card-img-top" src="img/154.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tuesday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col container">
                <div class="card" style="width:80%;Height:60%;margin-top:3%;">
                    <img class="card-img-top" src="img/564.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wednesday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col container">
                <div class="card" style="width:80%;Height:60%; margin-top:3%;">
                    <img class="card-img-top" src="img/234.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Thursday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col container">
                <div class="card" style="width:80%;Height:60%; margin-top:3%;">
                    <img class="card-img-top" src="img/789.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Friday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col container">
                <div class="card" style="width:80%;Height:60%;margin-top:3%;">
                    <img class="card-img-top" src="img/987.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Saturday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col container">
                <div class="card" style="width:80%;Height:60% ;margin-top:3%;">
                    <img class="card-img-top" src="img/369.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Sunday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col container invisible">
                <div class="card" style="width:50%;Height:50% ;margin-top:3%;">
                    <img class="card-img-top" src="img/New spl.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tuesday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col container invisible">
                <div class="card" style="width:50%;Height:50%;margin-top:3%;">
                    <img class="card-img-top" src="img/Thu spl.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wednesday</h5>
                        <a href="#" class="btn btn-primary">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ORDE CART DESIGN  -->
    
    <div class="row"><blockquote class="blockquote"><h1>ORDER CART</h1></blockquote></div>

    <div class="row ">
        <div class="col-md-8"><h4 class="font-italic">
            <div class="row">
                <table class="table">
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Item ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="table-borderless">
                        <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>Pittu</td>
                        <td></td>
                        <td>60</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>2</td>
                        <td>idiyapam</td>
                        <td></td>
                        <td>100</td>
                        </tr>
                    </tbody>
                 </table>
            </div>
        </div>

        <div class="col-md-1">
        </div>

        <div class="col-md-3">
            <div class="row">
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody class="table-borderless">
                            <tr>
                            <th scope="row">1</th>
                            <td>60</td>                        
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>100</td>                    
                            </tr>
                        </tbody>
                </table>
            </div>
            <div class="row">
                <button type="button" class="btn btn-success w-100">Order</button>
            </div>
        </div>
    </div>
</div>

   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
