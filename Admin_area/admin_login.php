<?php
include('../includes/connect.php');
include('../functions/common_function.php');


@session_start();

if(isset($_POST['admin_login'])){
    $user_username=$_POST['username'];
    $user_password=$_POST['password'];
    
    $select_query="Select * from `admin_table` where admin_name='$user_username' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
  
 


  if($row_count>0){
      $_SESSION['username']=$user_username;
      if(password_verify($user_password,$row_data['admin_password'])){
          echo "<script>alert('Logged in Successfully!!')</script>";
          echo "<script>window.open('index.php','_self')</script>";
          
        
      }else{
          echo "<script>alert('Invalid Password')</script>";
      }
      
  }else{
      echo "<script>alert('Invalid Credentials')</script>";
  }

}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin login</title>
     <!--  bootstrrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">


    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
     integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin login

        </h2>
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-6 col-lg-5 ">
                <img src="../images/adminlogin.jpg" alt="admin registration" 
                class="img-fluid" >
            </div>
            <div class="col-lg-6 col-lg-4 ">
                <form action="" method="post" >
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label" >Username</label>
                        <input type="text" id="username" name="username"
                        placeholder="enter your username" required="required"
                        class="form-control" >

                    </div>
                   
                    <div class="form-outline mb-4">
                        <label for="" class="form-label" >password</label>
                        <input type="password" id="password" name="password"
                        placeholder="enter your password" required="required"
                        class="form-control" >
                    </div>
                  
                    <div>
                        <input type="submit" class=" bg-info py-2 px-3 border-0"
                        name="admin_login" value="login" >
                        <p class="small fw-bold mt-2 pt-1"> Dont  have an account ?<a 
                        href="admin_registration.php" class="link-danger" > Register</a> </p>
                    </div>

                </form>
            </div>
        </div>

    </div>
</body>
</html>