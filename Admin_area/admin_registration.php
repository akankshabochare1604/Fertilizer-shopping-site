<?php
include('../includes/connect.php');
include('../functions/common_function.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['admin_register'])){
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['confirm_password'];

    // Select query
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0){
        echo "<script>alert('User already exists')</script>";
    } elseif($password != $conf_user_password) {
        echo "<script>alert('Passwords Do not match!!!')</script>";
    } else {
        // Insert query 
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) 
                        VALUES ('$admin_username', '$admin_email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);

        if($sql_execute) {
            echo "<script>alert('Registration Successful!')</script>";
            // Redirect to another page if needed
            header("Location: index.php");
            // exit();
        } else {
            echo "<script>alert('Registration Failed!')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex ">
            <div class="col-lg-6 ">
                <img src="../images/adminreg.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 ">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info py-2 px-3 border-0" name="admin_register" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
