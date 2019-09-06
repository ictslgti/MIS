<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->  
<?php
$title = "Home | SLGTI";
 include_once("config.php"); 
 include_once("head.php"); 
 include_once("menu.php"); 
 ?>
<!--END DON'T CHANGE THE ORDER--> 

<!--BLOCK#2 START YOUR CODE HERE -->
<p>order your food and enjoy your meal</p>

<div class="container-fluid">
        <div class="row"><blockquote class="blockquote"><h1>ORDER CART</h1></blockquote></div>
     
    <div class="row ">
        <div class="col-md-8"><h4 class="font-italic"><strong>Order Details</strong></h4>
            <div class="row  border border-secondary rounded-lg  bg-white rounded">
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
                        <td>kothu</td>
                        <td></td>
                        <td>100</td>
                        </tr>
                    </tbody>
                 </table>
            </div>
        </div>

        <div class="col-md-1">
        </div>

        <div class="col-md-3 border border-primary rounded-lg shadow p-3 mb-5 bg-white rounded"><h4 class="font-italic"><strong> FOOD CART</strong></h4>
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
                <button type="button" class="btn btn-success w-100 font-weight-bold">Order</button>
            </div>
        </div>
    </div>
</div>

   
<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->   
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->  
