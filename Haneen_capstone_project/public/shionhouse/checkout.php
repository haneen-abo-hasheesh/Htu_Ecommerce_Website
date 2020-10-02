<?php



    require ('conec.php');
    include_once('headerpu.php');

 
        if(!isset($_SESSION['id'])){
 
            header("location:check.php");
 
        }
 
  

 ?>
 <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">

         <div class="container h-100">

             <div class="row h-100 align-items-center">

                 <div class="col-12">

                     <div class="page-title text-center">

                         <h2>Checkout</h2>

                     </div>

                 </div>

             </div>

         </div>

     </div>

     <!-- ##### Breadcumb Area End ##### -->
 
    <!-- ##### Checkout Area Start ##### -->

     <div class="checkout_area section-padding-80">

         <div class="container">

             <div class="row">
 
                <div class="col-12 col-md-6">

                     <div class="checkout_details_area mt-50 clearfix">
 
                        <div class="cart-page-heading mb-30">

                             <h5>Billing Address</h5>

                         </div>
 
                        <form action="#" method="post">

                             <div class="row">

                                 <?php  


                                     $query1="SELECT * FROM customer where customer_id={$_SESSION['id']}";

                                     $result1=mysqli_query($conn,$query1);

                                      $u=mysqli_fetch_assoc($result1);
 
                                ?>

                                <div class="col-md-6 mb-3">

                                     <label for="first_name">Full Name <span>*</span></label>

                                     <input type="text" class="form-control" name="fullname"  

                                     value="<?php if(isset($_SESSION['id'])){ echo $u['customer_name'];}?>" disabled>

                                 </div>


                                 <div class="col-12 mb-3">

                                     <label for="phone_number">Mobile <span>*</span></label>

                                     <input type="text" class="form-control" name="mobile"  min="0" 

                                     value="<?php if(isset($_SESSION['id'])){ echo $u['customer_mobile'];}?>" disabled>

                                 </div>

                                 <div class="col-12 mb-4">

                                     <label for="email_address">Email Address <span>*</span></label>

                                     <input type="email" class="form-control" name="email"  

                                     value="<?php if(isset($_SESSION['id'])){ echo $u['customer_email'];}?>" disabled>

                                 </div>

                                 <div class="col-12 mb-3">

                                     <label for="street_address">Address <span>*</span></label>

                                     <input type="text" class="form-control mb-3" name="address"  

                                     value="<?php if(isset($_SESSION['id'])){ echo $u['customer_address'];}?>" disabled>


                                 </div>


                             </div>

                         </form>

                     </div>

                 </div>
 
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">

                     <div class="order-details-confirmation">
 
                        <div class="cart-page-heading">

                             <h5>Your Order</h5>

                             <p>The Details</p>

                         </div>

                         <ul class='order-details-form mb-4'>

                         <li><span>Product</span> <span>Total</span></li>

                         <?php

                         $total=0;

                         foreach ($_SESSION['cart'] as $key => $value ) {

                          $query1="SELECT * FROM product where product_id=$value";

                          $result1=mysqli_query($conn,$query1);

                          $haneen=mysqli_fetch_assoc($result1);

                          $total=$total+$haneen['product_price'];
 
                       echo "


                             <li><span>$haneen[product_name]</span> <span><span>$</span>$haneen[product_price]</span></li>


                                     ";

                                 }


                        echo "<li><span>Subtotal</span> <span><span>$</span>$total</span></li>

                            <li><span>Shipping</span> <span>Free</span></li>

                            <li><span>Total</span> <span><span>$</span>$total</span></li>

                         </ul>";
 
                        ?>

                         <div id="accordion" role="tablist" class="mb-4">


                             <div class="card">

                                 <div class="card-header" role="tab" id="headingTwo">

                                     <h6 class="mb-0">

                                         <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>

                                     </h6>

                                 </div>

                                 <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">

                                     <div class="card-body">

                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>

                                     </div>

                                 </div>

                             </div>        

                         </div>

                         <a style="margin: 10px;" href="receipt.php" class="btn essence-btn">Place Order</a>

                         <a href="index.php" class="btn essence-btn">Back to Shopping</a>

                         </ul>

                 </div>

             </div>

         </div>

     </div>
         
         <?php include_once('footerpu.php');?>