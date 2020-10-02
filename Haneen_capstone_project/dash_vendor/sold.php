

<?php

ob_start();
require 'conec.php';
include_once('headerv.php');
    
//header('location:sold.php');


?>




 



<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        
                            
                              <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>customer_id</th>
                                                <th>customer-email</th>
                                                <th>customer-name</th>
                                                <th>customer-mobile</th>
                                                <th>customer-address</th>
                                                <th>product_name</th>
                                                <th>order_id</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          $query="SELECT * FROM customer";
                                           $result= mysqli_query($conn,$query);
                                         while($customer= mysqli_fetch_assoc($result)){
                                             echo'<tr>';
                                             echo "<td>{$customer['customer_id']}</td>";
                                             echo "<td>{$customer['customer_email']}</td>";
                                             echo "<td>{$customer['customer_name']}</td>";
                                             echo "<td>{$customer['customer_mobile']}</td>";
                                             echo "<td>{$customer['customer_address']}</td>"; }

                                              $query1="SELECT * FROM product";
                                           $result1= mysqli_query($conn,$query1);
                                         while($pro= mysqli_fetch_assoc($result1)){
                                           
                                             echo "<td>{$pro['product_name']}</td>"; 
                                         }
                                             
                                               $query2="SELECT * FROM order";
                                           $result2= mysqli_query($conn,$query2);
                                         while($ord= mysqli_fetch_assoc($result2)){
                                           
                                             echo "<td>{$ord['order_id']}</td>";
                                           
                                             
                                         }  
                                             
                                         
                                              
                                            ?>
                                            
                                            
                                            
                                          
                                              
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
    </div>
</div>
