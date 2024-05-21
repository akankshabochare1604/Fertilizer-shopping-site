<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="../images/adminreg.jpg" alt="admin registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!-- email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                </div>
                <!-- image -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                </div>
                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>
                <!-- confirm password -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <!-- address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">User address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                </div>
                <!-- contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">User Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact"/>
                </div>
                <div class="text-center mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info fw-bold text-dark py-2 px-2 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
