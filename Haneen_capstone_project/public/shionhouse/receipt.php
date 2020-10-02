<?php

	session_start();
	ob_start();
    require('conec.php');

    	if(!isset($_SESSION['id'])){

			header("location:check.php");

		}
			if(isset($_SESSION['id'])){

			 $customer=$_SESSION['id'];
            }

    $products = implode(",", $_SESSION['cart']);

    $date=date("Y/m/d");

        
		 $insert="INSERT INTO orders (order_date,customer_id,product_name)
            VALUE('$date','$customer','$products')";
        


            $result3=mysqli_query($conn,$insert);    
 


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title  -->
    <title>Receipt</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

	 <div style="margin-left: 262px;" class="col-12 col-md-6 col-lg-5 ">
                    <div class="order-details-confirmation">

                    	<ul class='order-details-form mb-4'>

                    		<?php
                           
                    		  $query="SELECT max(order_id) FROM orders";
                    		  $result=mysqli_query($conn,$query); 
                    		  $h=mysqli_fetch_assoc($result);
                            
                    		 foreach ($h as $key) {
                             }
             			

                    		?>
                        <li><span>Order ID: </span> <span><?php echo $key; ?></span></li>
                       

                        </ul>
                    </div>
                </div>
                <a href="public.php" class="btn essence-btn" style="margin-left: 374px; margin-top: 20px;background: gray;">Go back to main</a>
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>