<?php require 'conec.php'; ?>

<?php include_once('headerv.php'); ?>

<?php 


if(isset($_POST['sub'])){
    $img_name=$_FILES['img']['name'];
     $tmp_name=$_FILES['img']['tmp_name'];
     $path = 'images/';
     move_uploaded_file($tmp_name,$path.$img_name);
  $name=$_POST['name'];
  $pricee=$_POST['price'];
  $pro_desc=$_POST['desc'];
    $cat_id=$_POST['cat_id'];
    $stat_id=$_POST['status_id'];
  
   $query="INSERT INTO product(product_name,product_price,product_describ,	product_img,category_id,status_id)
    values('$name','$pricee','$pro_desc','$img_name','$cat_id','$stat_id')";
   
   
    echo $query;
    
    mysqli_query($conn,$query);
    
   //header("location:add.php"); 
}


?>




<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                
                                 <div  style=" margin-top: 91px; margin-left: 103px;"class="card">
                                    <div class="card-header">product information</div>
                                    <div class="card-body">

                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">pro_name</label>
                                                <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">pro_img</label>
                                                <input id="cc-name" name="img" type="file" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">pro_price</label>
                                                <input id="cc-number" name="price" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">pro_desc</label>
                                                <input id="cc-name" name="desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                           
                                            <div class="form-group has-success">
                                              <label for="cars">cat_name:</label>
                               <?php
                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);

                                echo "<select required name='cat_id' class='form-control'>";
                                echo "<option  disabled selected>Please Select Course </option>";
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] ."</option>";
                                }

                                echo "</select>";
                                ?>
                                                
                                            </div>
                                            
                                            
                             
                                            
                                            
                                            
                                            
                                               <div class="form-group has-success">
                                              <label for="cars">vendor_name:</label>
                               <?php
                                $query1 = "SELECT * FROM vendors";
                                $result1 = mysqli_query($conn, $query1);

                                echo "<select required name='vendor_id' class='form-control'>";
                                echo "<option  disabled selected>Please Select vendor </option>";
                                while ($row = mysqli_fetch_assoc($result1)) {

                                    echo "<option value='" . $row['vendor_id'] . "'>" . $row['vendor_name'] ."</option>";
                                }

                                echo "</select>";
                                ?>
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                                     <div class="form-group has-success">
                                              <label for="cars">status:</label>
                               <?php
                                $query2 = "SELECT * FROM status";
                                $result2 = mysqli_query($conn, $query2);

                                echo "<select required name='status_id' class='form-control'>";
                                echo "<option  disabled selected>Please Select status </option>";
                                while ($row = mysqli_fetch_assoc($result2)) {

                                    echo "<option value='" . $row['status_id'] . "'>" . $row['status'] ."</option>";
                                }

                                echo "</select>";
                                ?>
                                                
                                            </div>  
                                            
                                 
                                            

                                            <div>
                                                <button  style="    background-color: gray; "id="payment-button" type="submit" name="sub" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div style="margin-left: 58px;" class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>pro_id</th>
                                                <th>pro_name</th>
                                                <th>pro_price</th>
                                             <th>product_desc</th>
                                                <th>product_img</th>
                                                <th>cat_name</th>
                                                <th>status</th>
                                                <th>edit</th>
                                                <th>Delete</th>

                                        </thead>
                                        <tbody>
                                                 <?php
                                          $query="SELECT*FROM product";
                                           $result= mysqli_query($conn,$query);
                                         while($product= mysqli_fetch_assoc($result)){
                                             
                                             $cat_id = $product['category_id'];

                                        $q = "SELECT * FROM category where category_id=$cat_id";
                                        $res = mysqli_query($conn, $q);
                                        $cat_name = mysqli_fetch_assoc($res);
                                             
                                             $vendor_id = $product['vendor_id'];
                                        $q2 = "SELECT * FROM vendors where vendor_id=$vendor_id";
                                        $res2 = mysqli_query($conn, $q2);
                                        $vendor_name = mysqli_fetch_assoc($res2);
                                             
                                             
                                             $status_id = $product['status_id'];
                                        $q3 = "SELECT * FROM status where status_id=$status_id";
                                        $res3 = mysqli_query($conn, $q3);
                                        $status = mysqli_fetch_assoc($res3);
                                             
                                             
                                             echo'<tr>';
                                             echo "<td>{$product['product_id']}</td>";
                                             echo "<td>{$product['product_name']}</td>";
                                              echo "<td>{$product['product_price']}</td>";
                                             echo "<td>{$product['product_describ']}</td>";
                                             echo "<td> <img style='height:100px;width:150px'src='images/{$product['product_img']}'</td>";
                                             echo "<td>{$cat_name['category_name']}</td>";
//                                             echo "<td>{$vendor_name['vendor_name']}</td>";
                                              echo "<td>{$status['status']}</td>";
                                              echo "<td><a href='proedi.php?id={$product['product_id']}'
                                                 class='btn btn-warning'>EDIT </a></td>";
                                              echo "<td><a href='prodel.php?id={$product['product_id']}'
                                                 class='btn btn-danger'>DELETE </a></td>";
                                             echo"</tr>";
                                            
                                             
                                         }
                                              
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
<?php 
