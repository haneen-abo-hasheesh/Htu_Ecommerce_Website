
<head>

<style>
    img {
        height: 184px;
    }
    
    
    </style>



</head>



<?php 
require 'conec.php'; 

include('header.php');


if(isset($_POST['sub'])){
    $img_name=$_FILES['img']['name'];
     $tmp_name=$_FILES['img']['tmp_name'];
     $path = 'images/';
     move_uploaded_file($tmp_name,$path.$img_name);
  $name=$_POST['name'];
  $pricee=$_POST['price'];
  $pro_desc=$_POST['desc'];
    $cat_id=$_POST['cat_id'];
  
   $query="INSERT INTO product(product_name,product_price,product_describ,	product_img,category_id ,vendor_id,status_id)
    values('$name','$pricee','$pro_desc','$img_name','$cat_id','0','0')";
   
    echo $query;
    mysqli_query($conn,$query);
    
    
//   header("location:product.php"); 
}



if(isset($_GET['id1'])){

$delete="delete from product where product_id={$_GET['id1']}";
    mysqli_query($conn,$delete);
  header("location:product.php");

}





if(isset($_GET['id'])){
$query="select * from product where product_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $new=mysqli_fetch_assoc($result);
}


if(isset($_POST['edit'])){
    
    $name=$_POST['name'];
    $img=$new['img'];
     if(!empty($_FILES['img']['name']))
   {
      $img=$_FILES['img']['name'];
     $tmp_name=$_FILES['img']['tmp_name'];
    $path = 'images/';
        move_uploaded_file($tmp_name,$path.$img);
   }
     $pricee=$_POST['price'];
    $pro_desc=$_POST['desc'];
    $cat_id=$_POST['cat_id'];
        
    

   
    $edit="UPDATE product SET product_name='$name',
    product_img='$img',
    product_price='$pricee',
    product_describ='$pro_desc',
    category_id='$cat_id'
    
    WHERE product_id={$_GET['id']}";
     mysqli_query($conn,$edit);
    header("location:product.php");
    
    
}


?>




<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                
                                 <div  style=" margin-top: 91px; margin-left: 103px;" class="card">
                                    <div class="card-header">product information</div>
                                    <div class="card-body">

                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">pro_name</label>
                                                <input id="cc-pament" value="<?php if(isset($_GET['id'])) {echo $new['product_name'];} ?>"  name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">pro_img</label>
                                                <input id="cc-name" value="0" name="img" type="file" class="form-control cc-name valid">
                                              
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">pro_price</label>
                                                <input id="cc-number" value="<?php if(isset($_GET['id'])) {echo $new['product_price'];} ?>" name="price" type="tel" class="form-control cc-number identified visa"
                                                   >
                                            
                                            </div>
                                             <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">pro_desc</label>
                                                <input id="cc-name" value="<?php if(isset($_GET['id'])) {echo $new['product_describ'];} ?>" name="desc" type="text" class="form-control cc-name valid" >
                                              
                                            </div>
                                           
                                            <div class="form-group has-success">
                                              <label for="cars">cat_name:</label>
                               <?php
                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);

                                echo "<select required name='cat_id' class='form-control'>";
                                echo "<option  disabled selected>Please Select category</option>";
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] ."</option>";
                                }

                                echo "</select>";
                                ?>
                                                
                                            </div>

<!--
                                            <div>
                                                <button style="background-color:gray;"id="payment-button" type="submit" name="sub" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>

                                            </div>
-->
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="form-actions form-group">
                                               
                                                  <button style="background-color:gray;" type="<?php 
                                                                                             if(isset($_GET['id'])){
                                                                                                 
                                                                                                 echo"hidden";
                                                                                             }
                                                                                             
                                                                                             else{
                                                                                                 echo"submit";
                                                                                             }
                                                                                        ?>"
                                                                                         name="sub" value="submit" class="btn btn-primary btn-lg"
                                                
                                                <?php 
                                                    if(isset($_GET['id'])){
                                                        
                                                        echo"disabled";
                                                    }
                                                    
                                                    ?>
                                                
                                                style="width:100%">submit
                                         </button>
                                                
                                                
                                                
                                                 <button style="background-color:gray;" type="<?php 
                                                                                             if(isset($_GET['id'])){
                                                                                                 
                                                                                                 echo"submit";
                                                                                                
                                                                                             }
                                                                                             
                                                                                             else{
                                                                                                  echo"hidden";
                                                                                             }
                                                                                        ?>"
                                                                                         name="edit" value="edit" class="btn btn-primary btn-lg">edit
                                            
                                                </button>
                                               
                                                
                                            </div>
                                        </form>
                                        
                                        
                                    </div>
                                </div>
                                <div  style="margin-left:60px;"class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>pro_id</th>
                                                <th>pro_name</th>
                                                <th>pro_price</th>
                                             <th>product_desc</th>
                                                <th>product_img</th>
                                                <th>cat_name</th>
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
                                             
                                             
                                             echo'<tr>';
                                             echo "<td>{$product['product_id']}</td>";
                                             echo "<td>{$product['product_name']}</td>";
                                              echo "<td>{$product['product_price']}</td>";
                                             echo "<td>{$product['product_describ']}</td>";
                                             echo "<td> <img style='width:50px;height:50px;' src='images/{$product['product_img']}'</td>";
                                             echo "<td>{$cat_name['category_name']}</td>";
                                             echo "<td>{$vendor_name['vendor_name']}</td>";
                                              echo "<td><a href='product.php?id={$product['product_id']}'
                                                 class='btn btn-warning'>EDIT </a></td>";
                                              echo "<td><a href='product.php?id1={$product['product_id']}'
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
