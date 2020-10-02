 

<?php
require 'conec.php';
include_once('header.php'); 
if(isset($_POST['sub'])){
  $email=$_POST['ema'];
  $password=$_POST['pas'];
   $fullname=$_POST['full'];
    $mobile=$_POST['mob'];
    $address=$_POST['addr'];
    

    $query="INSERT INTO customer(customer_email,customer_password,customer_name,customer_mobile,customer_address)
    values('$email','$password','$fullname','$mobile','$address')";
//    echo $query;
    
    mysqli_query($conn,$query);
    
    header('location:admin.php');
}

if(isset($_GET['id1'])){

$delete="delete from customer where customer_id={$_GET['id1']}";
    mysqli_query($conn,$delete);
//    header("location:admin.php");

}





if(isset($_GET['id'])){
$query="select * from customer where customer_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $new=mysqli_fetch_assoc($result);
}


if(isset($_POST['edit'])){
    
     $email=$_POST['ema'];
  $password=$_POST['pas'];
   $fullname=$_POST['full'];
    $mobile=$_POST['mob'];
    $address=$_POST['addr'];
        
    

   
    $edit="UPDATE customer SET customer_name='$fullname',
    customer_email='$email',
    customer_password='$password',
    customer_mobile='$mobile',
    customer_address='$address'
    
    WHERE customer_id={$_GET['id']}";
     mysqli_query($conn,$edit);
    header("location:customer.php");
    
    
}



?>




 



<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
          
                                <div style="margin-top: 106px;
   margin-right: -60px;
    margin-left: 120px;
 " class="card">
                                    <div class="card-header">customer Form</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">cname</div>
                                                    <input type="text" id="username3" value="<?php if(isset($_GET['id'])) {echo $new['customer_name'];} ?>" name="full" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">email</div>
                                                    <input type="email" id="email3" value="<?php if(isset($_GET['id'])) {echo $new['customer_email'];} ?>" name="ema" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Password</div>
                                                    <input type="password" id="password3" value="<?php if(isset($_GET['id'])) {echo $new['customer_password'];} ?>" name="pas" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                              <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">mobile</div>
                                                    <input type="password" id="pa" value="<?php if(isset($_GET['id'])) {echo $new['customer_mobile'];} ?>" name="mob" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                              <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">address</div>
                                                    <input type="password" id="pass" value="<?php if(isset($_GET['id'])) {echo $new['customer_address'];} ?>" name="addr" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                                                 
                                                                                                 echo"hidden";
                                                                                             }
                                                                                             
                                                                                             else{
                                                                                                 echo"submit";
                                                                                             }
                                                                                        ?>"
                                                                                         name="edit" value="edit" class="btn btn-primary btn-lg">edit
                                            
                                                </button>
                                               
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>customer_id</th>
                                                <th>customer-email</th>
                                                <th>customer-name</th>
                                                <th>customer-mobile</th>
                                                <th>customer-address</th>
                                                 <th>edit</th>
                                                 <th>delete</th>

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
                                             echo "<td>{$customer['customer_address']}</td>";
                                              echo "<td><a href='customer.php?id={$customer['customer_id']}'
                                                 class='btn btn-warning'>EDIT </a></td>";
                                              echo "<td><a href='customer.php?id1={$customer['customer_id']}'
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
