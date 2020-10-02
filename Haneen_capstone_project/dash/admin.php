
<?php
ob_start();
require 'conec.php';
include_once('header.php');

if(isset($_POST['sub'])){
  $email=$_POST['ema'];
  $password=$_POST['pas'];
   $fullname=$_POST['full'];
    

    $query="INSERT INTO admin(admin_email,admin_password,admin_name)
    values('$email','$password','$fullname')";

    
    mysqli_query($conn,$query);
    
    header('location:admin.php');
}


if(isset($_GET['id1'])){

$delete="delete from admin where admin_id={$_GET['id1']}";
    mysqli_query($conn,$delete);
    header("location:admin.php");

}





if(isset($_GET['id'])){
$query="select * from admin where admin_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $new=mysqli_fetch_assoc($result);
}


if(isset($_POST['edit'])){
    
    $name=$_POST['full'];
    $email=$_POST['ema'];
    $password=$_POST['pas'];
    $edit="UPDATE admin SET admin_email='$email',
    admin_password='$password',
    admin_name='$name'
    WHERE admin_id={$_GET['id']}";
     mysqli_query($conn,$edit);
    header("location:admin.php");
    
    
}

?>



 










<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
          
                                <div style="margin-top: 106px; margin-right: -60px; margin-left: 120px;" class="card">
                                    <div class="card-header">admin Form</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Username</div>
                                                    <input type="text" id="username3" name="full" value="<?php if(isset($_GET['id'])) {echo $new['admin_name'];} ?>" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email</div>
                                                    <input type="email" id="email3" value="<?php if(isset($_GET['id'])) {echo $new['admin_email'];}?>" name="ema" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Password</div>
                                                    <input type="password" id="password3" value="<?php if(isset($_GET['id'])) {echo $new['admin_password'];} ?>" name="pas" class="form-control">
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
                                                <th>admin_id</th>
                                                <th>admin-email</th>
                                                <th>admin-name</th>
                                                 <th>edit</th>
                                                 <th>delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          $query="SELECT * FROM admin";
                                           $result= mysqli_query($conn,$query);
                                         while($admin= mysqli_fetch_assoc($result)){
                                             echo'<tr>';
                                             echo "<td>{$admin['admin_id']}</td>";
                                             echo "<td>{$admin['admin_email']}</td>";
                                             
                                             echo "<td>{$admin['admin_name']}</td>";
                                              echo "<td><a href='admin.php?id={$admin['admin_id']}'
                                                 class='btn btn-warning'>EDIT </a></td>";
                                              echo "<td><a href='admin.php?id1={$admin['admin_id']}'
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
