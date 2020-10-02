<?php  
require 'conec.php';
include_once('headerpu.php');

?>



<head>
<style>
    
    #scrollUp{
        display: none !important;
    } 
    
    
    #slid{
        background-image: url("assets/img/hero/lig.jfif")  !important;
        background-repeat: no-repeat;
    }
    #slide{
      
        background-image: url("assets/img/hero/h1_hero2.jfif") !important;
    }
    #slidr{
        
       background-image: url("https://homepages.cae.wisc.edu/~ece533/images/airplane.png") !important;  
/*        background-image: url(assets/img/hero/h1_hero3.jfif) !important;*/
    }

    
    
    
</style>

</head>
                <div class="slider-active dot-style">
                    <!-- Single -->
                    <div class="single-slider hero-overly slider-height d-flex align-items-center" style="background-image: url('assets/img/hero/fir.jpg');">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div id="slid" class="hero__caption">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                   <div class="single-slider hero-overly slider-height d-flex align-items-center" style="background-image: url('assets/img/hero/ni.jfif');">
                       
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                   
                                    <div class="hero__caption">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                   <div class="single-slider hero-overly slider-height d-flex align-items-center" style="background-image: url('assets/img/hero/wa.jfif');">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
<!--
                                        <h1>fashion<br>changing<br>always</h1>
                                        <a href="shop.html" class="btn">Shop Now</a>
-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        <!-- End Hero -->
        <!--? Popular Items Start -->
        <div class="popular-items pt-50">
            <div class="container-fluid">
                <div class="row">
                    



                    
                    
                    
                    
                    
                                           <?php 
                $query="select * from category";
                $result=mysqli_query($conn,$query);
                while($cat=mysqli_fetch_assoc($result)){
                ?>
                    
                   <div class="col-lg-3 col-md-6 col-sm-6">
                       <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" 
                       style="background-image: url('imm/<?php echo $cat['category_img']; ?>')">
                            <div class="popular-img">
                              
                                <div class="img-cap">
                                    <span style="font-size: 27px;"<?php echo $cat['category_id'] ?>><?php echo $cat['category_name'] ?></span>
                                </div>
                                <div class="favorit-items">
                                 <a href='shop.php?id=<?php echo $cat['category_id'] ?>' class="btn">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>  
                    
                    
                   <?php
    
                         }
                
                ?>    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                
 </div>
</div>
</div>
<!-- Popular Items End -->
<!--? New Arrival Start -->
<div class="new-arrival">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
                  
            
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2>new<br>arrival</h2>
                </div>
            </div>
        </div>
        <div class="row">
            
            
                              <?php 
                $query="select * from arrival";
                $result=mysqli_query($conn,$query);
                while($cat=mysqli_fetch_assoc($result)){
                ?>
            
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" 
                       >

                    
                    </div>
                    <div class="popular-caption">
                        <h3><a href='shop.php?id=<?php echo $cat['arrival_id'] ?>' ></a></h3>
                        <img style="
        height: 184px;
   



</head>"src="imm/<?php echo $cat['arrival_img'];?>">
                        <div style="margin-left: 55px;" class="rating mb-10">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span style="margin-left: 90px;"><?php echo $cat['arrival_price'] ?></span>
                    </div>
                </div>
            
          <?php
    
                         }
                
                ?>
            </div>


</div>
<!-- Button -->
<div class="row justify-content-center">
<!--
    <div class="room-btn">
        <a href="catagori.html" class="border-btn">Browse More</a>
    </div>
-->
</div>
</div>

<!--? New Arrival End -->
<!--? collection -->
<section  >
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
<!--
            <div class="single-question text-center">
                <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">collection houses our first-ever</h2>
                <a href="about.html" class="btn wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">About Us</a>
            </div>
-->
        </div>
    </div>
</div>
</section>

<!-- Popular Locations End -->
<!--? Services Area Start -->
<div class="categories-area section-padding40 gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="cat-icon">
                        <img src="assets/img/icon/services1.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="cat-icon">
                        <img src="assets/img/icon/services2.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                    <div class="cat-icon">
                        <img src="assets/img/icon/services3.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="cat-icon">
                        <img src="assets/img/icon/services4.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--? Services Area End -->


                           <?php include_once('footerpu.php'); ?>