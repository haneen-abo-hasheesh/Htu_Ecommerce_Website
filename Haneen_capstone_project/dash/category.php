
<?php include_once('header.php') ?>  

<?php 
 
     ob_start();
    require'conec.php'; 
    if(isset($_POST['sub'])){

        $img_name=$_FILES['cat_img']['name'];
        $tmp_name=$_FILES['cat_img']['tmp_name'];
        $path = 'images/';
        move_uploaded_file($tmp_name,$path.$img_name);

      $name=$_POST['name'];



        $query="INSERT INTO category(category_name,category_img)
        values('$name','$img_name')";
       

        mysqli_query($conn,$query);


    }



if(isset($_GET['id1'])){

$delete="delete from category where category_id={$_GET['id1']}";
    mysqli_query($conn,$delete);
   header("location:admin.php");

}





if(isset($_GET['id'])){
$query="select * from category where category_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $new=mysqli_fetch_assoc($result);
}


if(isset($_POST['edit'])){
    
  
    $name=$_POST['name'];
 $img=$new['category_img'];
    
   if(!empty($_FILES['cat_img']['name']))
   {
      $img=$_FILES['cat_img']['name'];
     $tmp_name=$_FILES['cat_img']['tmp_name'];
    $path = 'images/';
        move_uploaded_file($tmp_name,$path.$img);
   }
   
    $edit="UPDATE category SET category_name='$name',
    category_img='$img' WHERE category_id={$_GET['id']}";
     mysqli_query($conn,$edit);
    
    
   header("location:category.php");
    
    
}

?>

  



   
    <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-9">

                                   
          
                                <div style="margin-top: 106px; margin-right: -60px; margin-left: 120px;" class="card">
                                    <div class="card-header">category Form</div>
                                    <div class="card-body card-block">
                                        <form action=""  method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">category_name</div>
                                                    <input type="text" id="username3" value="<?php if(isset($_GET['id'])) {echo $new['category_name'];} ?>" name="name" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                         
                          
                                            
                                              <div class="input-group">
                                                    <div class="input-group-addon">category_img</div>
                                                  
                                                    <input id="" name="cat_img" type="file" class="form-control cc-name " value="<?php if(isset($_GET['id'])){echo $new['category_img'];}?>" >
                                                    
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
                                                    <th>cat_id</th>
                                                    <th>cat-name</th>
                                                    <th>cat-image</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>


                                            </thead>
                                            <tbody>

                                        <?php
                                              $query="SELECT*FROM category";
                                               $result= mysqli_query($conn,$query);
                                             while($category= mysqli_fetch_assoc($result)){
                                                 echo '<tr>';
                                                 echo "<td>{$category['category_id']}</td>";
                                                 echo "<td>{$category['category_name']}</td>";
                                                 echo "<td> <img src='images/{$category['category_img']}'</td>";
                                                 
                                                  echo "<td><a href='category.php?id={$category['category_id']}'
                                                     class='btn btn-warning'>EDIT</a></td>";
                                                  echo "<td><a href='category.php?id1={$category['category_id']}'
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

    
            



  