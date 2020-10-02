
<?php
require 'conec.php';
include_once('header.php');

if(isset($_POST['sub'])){
  $email=$_POST['ema'];
  $password=$_POST['pas'];
   $fullname=$_POST['full'];
    

    $query="INSERT INTO vendors(vendor_email,vendor_password,vendor_name)
    values('$email','$password','$fullname')";
//    echo $query;
    
    mysqli_query($conn,$query);
    
    header('location:vendorad.php');
}




if(isset($_GET['id1'])){

$delete="delete from vendors where vendor_id={$_GET['id1']}";
    mysqli_query($conn,$delete);
//    header("location:admin.php");

}





if(isset($_GET['id'])){
$query="select * from vendors where vendor_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $new=mysqli_fetch_assoc($result);
}


if(isset($_POST['edit'])){
    
     $email=$_POST['ema'];
  $password=$_POST['pas'];
   $fullname=$_POST['full'];
   
        
    

   
    $edit="UPDATE vendors SET vendor_name='$fullname',
    vendor_email='$email',
    vendor_password='$password'
   
    
    WHERE vendor_id={$_GET['id']}";
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
                                    <div class="card-header">vendor Form</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Username</div>
                                                    <input type="text" id="username3" value="<?php if(isset($_GET['id'])) {echo $new['vendor_name'];} ?>" name="full" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email</div>
                                                    <input type="email" id="email3" value="<?php if(isset($_GET['id'])) {echo $new['vendor_email'];} ?>" name="ema" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Password</div>
                                                    <input type="password" id="password3" value="<?php if(isset($_GET['id'])) {echo $new['vendor_password'];} ?>" name="pas" class="form-control">
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
                                                <th>vendor_id</th>
                                                <th>vendor-email</th>
                                                <th>vendor-name</th>
                                                 <th>edit</th>
                                                 <th>delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          $query="SELECT * FROM vendors";
                                           $result= mysqli_query($conn,$query);
                                         while($vendor= mysqli_fetch_assoc($result)){
                                             echo'<tr>';
                                             echo "<td>{$vendor['vendor_id']}</td>";
                                             echo "<td>{$vendor['vendor_email']}</td>";
                                             
                                             echo "<td>{$vendor['vendor_name']}</td>";
                                              echo "<td><a href='vendorad.php?id={$vendor['vendor_id']}'
                                                 class='btn btn-warning'>EDIT </a></td>";
                                              echo "<td><a href='vendorad.php?id1={$vendor['vendor_id']}'
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
