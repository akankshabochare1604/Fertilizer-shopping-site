<?php
include('../includes/connect.php');
include('../functions/common_function.php');

@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login
    </title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <style>
      body{
        overflow-x:hidden;
      }  
    </style>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">User Login</h2>
<div class="row d-flex align-items-center justify-content-center mt-5">
    <div class=" col-lg-12 col-xl-6">
    <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-6 col-lg-5 ">
                <img src="../images/adminlogin.jpg" alt="admin registration" 
                class="img-fluid" >
            </div>
            
    <div class="row d-flex justify-content-center align-item-center">
            
        <form action="" method="post" enctype="multipart/form-data">
            <!-- username -->
            <div class="form-outline mb-4">
                <label for="user_username" class="form-label" >Username</label>
                <input type="text" id="user_username" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="user_username"/>
            </div>
           
<!-- password -->
<div class="form-outline mb-4">
                <label for="user_password" class="form-label" >Password</label>
                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
            </div>
         
          <div class="text-center mt-4 pt-2">
            <!-- <input type="submit" value="Login" class="bg-info fw-bold text-dark py-2 px-2 border-0" name="user_register"> -->
            <input type="submit" value="Login" class="bg-info fw-bold text-dark py-2 px-2 border-0" name="user_login">

            <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="user_registration.php"> Sign up </a></p>
          </div>  

        </form>
    </div>
</div>
</div>


    
</body>
</html>
<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_query="Select * from `usertable` where username='$user_username' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    // cart item
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip' ";
   $select_cart=mysqli_query($con,$select_query_cart);
   $row_count_cart=mysqli_num_rows($select_cart);


    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Logged in Successfully!!')</script>";
            if($row_count==1 && $row_count_cart==0 ){
                $_SESSION['username']=$user_username;
                  echo "<script>alert('Logged in Successfully!!')</script>";
                  echo "<script>window.open('profile.php','_self') </script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Logged in Successfully!!')</script>";
                echo "<script>window.open('payment.php','_self') </script>";
            }
        }else{
            echo "<script>alert('Invalid Password')</script>";
        }
        
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>