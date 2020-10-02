 <?php
ob_start();
session_start();
require ('conec.php');

if(isset($_POST['submit'])){

 $name=$_POST['fullname'];
 $email	=$_POST['email'];
 $password=$_POST['password'];
 $address=$_POST['address'];
 $mobile=$_POST['mobile'];
 	
 	$insert="INSERT INTO user(user_fullname,user_email,user_password,user_mobile,user_address)
 						 value('$name','$email','$password','$mobile','$address')";
 	mysqli_query($connect,$insert);					  
 	header("Location: login_customer.php");
}

if(isset($_POST['submit'])){

	header("Location: logincus.php");
	}



?>
  
  <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->



<!-- Title -->
<title>Sign up customer</title>



<!-- Favicon -->
<link rel="icon" href="img/core-img/favicon.ico">
<!-- Core Style CSS -->
<link rel="stylesheet" href="css/core-style.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="checkout_area section-padding-80">
<div class="container">
<div class="row">



<div class="col-12 col-md-6">
<div class="checkout_details_area mt-50 clearfix">



<div class="cart-page-heading mb-30">
<h5>Sign Up</h5>
</div>



<form action="" method="post">
<div class="row">
<div class="col-md-6 mb-3">
<label for="first_name">Full Name <span>*</span></label>
<input type="text" class="form-control" name="fullname" value="" required>
</div>
<div class="col-md-6 mb-3">
<label for="last_name">Password <span>*</span></label>
<input type="password" class="form-control" name="password" value="" required>
</div>

<div class="col-12 mb-3">
<label for="phone_number">Mobile <span>*</span></label>
<input type="text" class="form-control" name="mobile" min="0" value="" required>
</div>
<div class="col-12 mb-4">
<label for="email_address">Email Address <span>*</span></label>
<input type="email" class="form-control" name="email" value="" required>
</div>
<div class="col-12 mb-3">
<label for="street_address">Address <span>*</span></label>
<input type="text" class="form-control mb-3" name="address" value="" required>

</div>
<div>



<input id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info " value="Register" >



<a id="payment-button" href="logincus.php" name="submit2" class="btn btn-lg btn-info " value="" >Sign in</a>



</div>
</div>
</form>
</div>
</div>
    </div>
    </div>
    </div>


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