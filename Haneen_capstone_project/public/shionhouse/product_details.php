<?php  
require 'conec.php';
include_once('headerpu.php');



    if (isset($_POST['addtocart'])) {
        array_push($_SESSION['cart'],$_GET['id']);
        
     
       
        
//       echo  "<script type='text/javascript'>
//               
//              window.location.href='single-product.php?id=$product_id'
//            
//    </script>";
        
    }

?>

        <!-- breadcrumb Start-->
        
        <!-- breadcrumb End-->
        <!--?  Details start -->
        <div class="directory-details pt-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                       
                        <div class="directory-cap mb-40">
                            
                            
                              <?php 
                $query="select * from product where product_id={$_GET['id']}";
                $result=mysqli_query($conn,$query);
                while($cat=mysqli_fetch_assoc($result)){
                ?>
            
           

                    
                
                    <div class="popular-caption">
                      
                       
                         <img style="margin-top: 24px;
width: 339px;" src="imm/<?php echo $cat['product_img'];?>">
                    </div>
            
            
         

                        </div>
<!--
                        <div class="small-tittle mb-20">
                            <h2>The Product</h2>
                        </div>
-->
                        <div class="gallery-img">
                            <div class="row">
                                <div style="margin-left: 406px;
    margin-top: -267px;" class="col-lg-6">
                                     <div class="small-tittle mb-20">
                                       <h2>Description</h2>
                                     </div>
                                     <span><?php echo $cat['product_describ'] ?></span>  <br> <br>
                                     <div class="small-tittle mb-20">
                                       <h2>The Price </h2> <span> <span> $ <?php echo $cat['product_price'] ?></span></span>
                                     </div>
                                    
                                </div>
                             
                            </div>
                        </div>
                        
                  <form class='cart-form clearfix' method='post'>
                <!-- Select Box -->
              
                <!-- Cart & Favourite Box -->
                <div class='cart-fav-box d-flex align-items-center'>
                    <!-- Cart -->
                    <button style="margin-left: 260px;

    margin-bottom: 25px;
" type='submit' name='addtocart' value='5' class='btn essence-btn'>Add to cart</button>
                    <!-- Favourite -->
                    <div class='product-favourite ml-4'>
<!--                        <a href='#' class='favme fa fa-heart'></a>-->
                    </div>
                </div>
            </form>
                         <?php
    
                         }
                
                ?>
                    </div>
                   
                </div>
            </div>
        </div>
        <!--  Details End -->
        <!-- listing-area Area End -->
        <!--? Popular Locations Start 01-->
        
        <!-- Popular Locations End -->

       
        <!--? Services Area End -->

           <?php include_once('footerpu.php'); ?>
   