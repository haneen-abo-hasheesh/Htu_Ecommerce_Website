
<head>
<style>
    
    .nice-select{
        all: unset;
    }  
    
</style>



</head>





<?php  
require 'conec.php';
include_once('headerpu.php');

$path="imm/";
?>
    <!-- header end -->
    <main>
       
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-50">
                            <h2>Shop with us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                        
                  
                    <!--?  Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8 ">
                        <!--? New Arrival Start -->
                        <div class="new-arrival new-arrival2">
                            <div class="row">
                                <?php
                                $query="select * from product where product.category_id={$_GET['id']}";
                                $result=mysqli_query($conn,$query);

                      while($new=mysqli_fetch_assoc($result)){
                          
                            
                          ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="<?php echo "$path$new[product_img]" ?>"> 
                                        
                                            
                                            <div class="favorit-items">
                                                <!-- <span class="flaticon-heart"></span> -->
                                                <img src="assets/img/gallery/favorit-card.png" alt="">
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                         <h3><a href="product_details.php?id=<?php echo "$new[product_id]" ?>"><?php echo "$new[product_name]" ?></a></h3>
                                            
                                           
                                         <div class="rating mb-10">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span><span>$<?php echo"$new[product_price]"?></span></span>
                                    </div>
                                </div>
                            </div>
                        
       <?php               
                
 }
                                ?>
             
       
     
    
</div>
<!-- Button -->

</div>
<!--? New Arrival End -->
</div>
</div>
</div>
</div>
<!-- listing-area Area End -->
<!--? Popular Items Start -->

<!-- Popular Items End -->
<!--? Services Area Start -->
<?php include_once 'footerpu.php';