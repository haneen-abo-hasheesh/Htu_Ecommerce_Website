
<head>

<style>
    img {
        height: 184px;
    }
    
    
    </style>



</head>





<?php 
  include_once('headerv.php');
    require'conec.php'; 
    if(isset($_POST['sub'])){

        $img_name=$_FILES['cat_img']['name'];
        $tmp_name=$_FILES['cat_img']['tmp_name'];
        $path = 'images/';
        move_uploaded_file($tmp_name,$path.$img_name);

      $name=$_POST['name'];
      $arrival_price=$_POST['arri_price'];



        $query="INSERT INTO arrival(arrival_name,arrival_img,arrival_price)
        values('$name','$img_name','$arrival_price')";
       

        mysqli_query($conn,$query);


    }



if(isset($_GET['id1'])){

    $delete="delete from arrival where arrival_id={$_GET['id1']}";
    mysqli_query($conn,$delete);
    header("location:arrival.php");

}





if(isset($_GET['id'])){
$query="select * from arrival where arrival_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $new=mysqli_fetch_assoc($result);
}


if(isset($_POST['edit'])){
    
    $name=$_POST['name'];

    $arri_price=$_POST['arri_price'];
        $img_name=$_FILES['cat_img']['name'];
        $tmp_name=$_FILES['cat_img']['tmp_name'];
        $picture=time().$img_name;
        $path = 'images/';
    
   
        move_uploaded_file($tmp_name,$path.$img_name);
    
    
    $edit="UPDATE arrival SET arrival_name='$name',
    arrival_img='$picture',
    arrival_price='$arri_price'
    
    WHERE arrival_id={$_GET['id']}";
    

  
    mysqli_query($conn,$edit);
    header("location:arrival.php");
    
    
}

?>

  



   
    <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-9">

                                   
          
                                <div style="margin-top: 106px; margin-right: -60px; margin-left: 120px;" class="card">
                                    <div class="card-header">arrival Form</div>
                                    <div class="card-body card-block">
                                        <form action=""  method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">arrival_name</div>
                                                    <input type="text" id="username3" value="<?php if(isset($_GET['id'])) {echo $new['arrival_name'];} ?>" name="name" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        
                                            
                                              <div class="input-group">
                                                    <div class="input-group-addon">arrival_img</div>
                                                    <input type="file" id="email3"  value="0" name="cat_img" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            
                                            
                                             <div class="input-group">
                                                    <div class="input-group-addon">arrival_price</div>
                                                    <input type="text" id="email3"  value="<?php if(isset($_GET['id'])) {echo $new['arrival_price'];} ?>" name="arri_price" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
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
                       
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>arrival_id</th>
                                                    <th>arrival-name</th>
                                                    <th>price</th>
                                                    <th>arrival-image</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>


                                            </thead>
                                            <tbody>

                                        <?php
                                              $query="SELECT*FROM arrivaL";
                                               $result= mysqli_query($conn,$query);
                                             while($category= mysqli_fetch_assoc($result)){
                                                 echo '<tr>';
                                                 echo "<td>{$category['arrival_id']}</td>";
                                                 echo "<td>{$category['arrival_name']}</td>";
                                                  echo "<td>{$category['arrival_price']}</td>";
                                                 echo "<td> <img style='width:50px;height:50px;'src='images/{$category['arrival_img']}'</td>";
                                                 
                                                  echo "<td><a href='arrival.php?id={$category['arrival_id']}'
                                                     class='btn btn-warning'>EDIT</a></td>";
                                                  echo "<td><a href='arrival.php?id1={$category['arrival_id']}'
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

    
            



  