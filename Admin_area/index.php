<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
// Check if admin is logged in
if(isset($_SESSION['username'])){
    $admin_username = $_SESSION['username'];
    
    // Query to fetch admin's actual name
    $query = "SELECT admin_name FROM admin_table WHERE admin_name = '$admin_username'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $admin_name = $row['admin_name'];
    } else {
        // Admin not found
        $admin_name = "Unknown";
    }
} else {
    // Admin not logged in
    $admin_name = "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--  bootstrrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file link for logo size-->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
bottom: 0;        }
body{
    overflow-x: hidden;
}
.product_img{
 width: 100px;   
 object-fit: contain;
}

    </style>
    <!-- <style>
        /* Navbar */
        .navbar {
            background-color: #343a40; /* dark gray */
        }
        .navbar-nav .nav-link {
            color: #ffffff; /* white */
        }
        .button button {
            margin: 5px;
            border-radius: 5px;
            padding: 8px 16px;
            background-color: #007bff; /* blue */
            color: #ffffff; /* white */
            border: none;
            cursor: pointer;
        }

.button button a {
    color: #ffffff; /* white */
    text-decoration: none;
    display: flex;
    align-items: center;
}

.button button:hover {
    background-color: #0056b3; /* darker blue on hover */
}

/* Footer */
.footer {
    background-color: #f8f9fa; /* light gray */
    color: #212529; /* dark gray */
}
</style> -->

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-exoand-lg navbar-dark bg-dark">
            <!--first child-->
            <div class="container-fluid">
                <img src="../images/agromart logo.png" alt="" class="logo"><!--here before images we used two dots(..)bcoz logo is in image folder and we r wrking in admins folder so to come out of img folder we used ..-->
            

                <nav class="navbar navbar-exoand-lg navbar-dark bg-dark">
                    <ul class="navbar-nav">
                    <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>";
                } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                        </li>";
                }
                ?>
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li> -->
                    </ul>

                </nav>
            </div>
        </nav>
        <!--second child-->
        <div class=" bg-light">
            <h3 class="text-center p-3">Manage Details</h3>
        </div>
        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-light p-1 d.flex align.items-center">
               
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-dark bg-light my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-dark bg-light my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-dark bg-light my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-dark bg-light my-1">View Categories</a></button>
                    <button><a href="index.php?insert_deli_part" class="nav-link text-dark bg-light my-1">Insert Delivery Partners</a></button>
                    <button><a href="index.php?view_delivery" class="nav-link text-dark bg-light my-1">View Delivery Partners</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-dark bg-light my-1">All orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-dark bg-light my-1">All payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-dark bg-light my-1">Users list</a></button>
                    <?php   
                if(!isset($_SESSION['username'])){
                    echo "<button><a href='admin_login.php' class='nav-link text-dark bg-light my-1'>Login</a></button>";
                } else {
                    echo "<button><a href='logout.php' class='nav-link text-dark bg-light my-1'>Logout</a></button> ";
                }
                ?>
                    <!-- <button><a href="admin_login.php" class="nav-link text-dark bg-light my-1">Login</a></button> -->
                </div>
            </div>
        </div>

        <!--fourth child-->
        <div class="container my-3">
            <?php 
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            ?>
        </div>
        <!--fifth child-->
        
            <?php 
            if(isset($_GET['insert_deli_part'])){
                include('insert_delivery_part.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_product.php');

            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
                
            }
            if(isset($_GET['view_delivery'])){
                include('view_delivery.php');
                
            }
            if(isset($_GET['edit_category'])){
                include('edit_categories.php');
            }
            if(isset($_GET['edit_delivery'])){
                include('edit_delivery.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }   
            if(isset($_GET['delete_delivery'])){
                include('delete_delivery.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['admin_register'])){
                include('admin_registration.php');
            } if(isset($_GET['admin_login'])){
                include('admin_login.php');
            }
            ?>
        </div>
        
        
        
        
        
        
       <!--include footer-->
<?php
include('../includes/footer.php');
?>
</div>
   

<!--  bootstrrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>>
</body>
</html>