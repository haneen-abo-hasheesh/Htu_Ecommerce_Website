<?php

session_start();

if(isset($_SESSION['id'])){
    
    header('location:checkout.php');
}

if(empty($_SESSION['id'])){
    
    
    if(isset($_POST['signin'])){
        
        header('location:logincus.php');
    }
    if(isset($_POST['signup'])){
        
        header('location:register_customer.php');
    }
}



?>
<!DOCTYPE html>
<html lang="en">



<head>
<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">



<!-- Title Page-->
<title>Login</title>





</head>
    
    
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="Customer Login">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">

                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="signin" type="submit">sign in</button>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="signup" type="submit">sign up</button>                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    </div>        
</body>

</html>
