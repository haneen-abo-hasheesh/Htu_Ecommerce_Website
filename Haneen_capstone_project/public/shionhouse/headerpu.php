<?php   
session_start();
ob_start();

if(!isset($_SESSION['cart'])){

 $_SESSION['cart'] = array();
}
    if(isset($_POST['removeCart'])){


          $id=$_POST['removeCart'];
      

          unset($_SESSION['cart'][$id]);
 
     }


?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fashion | Teamplate</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="manifest" href="site.webmanifest">-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/core-img/favicon.ico">
  
    
</head>

    <!-- Preloader Start-->
    <header>
        <!-- Header Start -->
        <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
<!--                <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>-->
                <p style="margin-top: 9px;
    margin-right: 14px;">Memorize Memories</p>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="public.php">Home</a>
<!--
                                <div class="megamenu">

                                </div>
-->
                            </li>
                            <li><a href="#">Pages</a>

                            </li>

                            <li><a href="#">Contact</a></li>
                          
                            

                        </ul>
                    </div>
                  
                </div>
                
            </nav>
    
            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                
                 <div class="header-right1 d-flex align-items-center">
                                 <div class="header-social d-none d-md-block">
                           <a href="#"><i class="fab fa-twitter"></i></a>
                            
                           <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            
                            </div>
                            </div>
                
                
                
                
                
                
                
                
                
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <div style="padding-top: 30px;
    padding-left: 20px;
    padding-right: 20px;" class="nav-search search-switch">
                                            <i class="ti-search"></i>
                                        </div>
<!--                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">-->
<!--                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>-->
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
               
<!--                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>-->
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
<!--                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>-->
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span><?php 
                        
                        $h=count($_SESSION['cart']); 
                        
                        
                        echo"$h"; 
                        
                        
                    
                     
                        
                        
                        

                        ?></span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span><?php $h=count($_SESSION['cart']); echo"$h"; ?></span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
                         <div class="cart-list">
<?php 
                             $total=0;
foreach ($_SESSION['cart'] as $key => $value) {
 $query="SELECT * from product where product_id='$value'";
$result=mysqli_query($conn,$query);
$han=mysqli_fetch_assoc($result);
 $total=$total+$han['product_price'];

                      
                     echo "<form class='cart-form clearfix' method='post' action=''>
                    <button type='submit' name='removeCart' value='$key' class='product-remove' ><i class='fa fa-close' ></i></button>  
                <div class='single-cart-item'>
                    <a href='#' class='product-image'>
                        <img src='imm/{$han['product_img']}' style='height:111px;' class='cart-thumb' alt=''>
                        
                        <div class='cart-item-desc'>
                        
                          
                            <span class='badge'>Mango</span>
                            <h6>{$han['product_name']}<br><span>$</span>{$han['product_price']}</h6>
                        
                           
                        </div>
                    </a>
                </div> </form>";
              
               }
           
             echo "</div>

            <!-- Cart Summary -->
            <div class='cart-amount-summary'>

                <h2>Summary</h2>
                <ul class='summary-table'>
                
                    <li><span>delivery:</span> <span>Free</span></li>                  
                    <li><span>total:</span> <span>$<span>$total</span></span></li>
                </ul>
                <div class='checkout-btn mt-100'>
                    <a href='checkout.php' class='btn essence-btn'>check out</a>
                </div>";

                 ?>
                    </div>

    
        </div>
    </div>
    