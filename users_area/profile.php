<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    echo "User is not logged in.";
    exit; // Exit script if user is not logged in
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .profile_img{
            width: 90%;
            margin: auto;
            display: block;
            height: 100%;
            object-fit: contain;
        }
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="../images/agromart logo.png" alt="" class="logo">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php">
                                <i class="fas fa-shopping-cart"></i>
                                <sup><?php echo cart_item(); ?></sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?></a>
                        </li>
                    </ul>
                    <!-- Search form -->
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-primary" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- Cart -->
        <?php cart(); ?>  
        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
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
                <?php   
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='user_login.php'>Login</a>
                        </li>";
                } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";
                }
                ?>
            </ul>
        </nav>
        <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center"><b>Agro Store</b></h3>
            <p class="text-center"><i>Organic Fertilizers: Good for your plants, Good for the planet</i></p>
        </div>
        <!-- Fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-dark">
                        <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                    </li>
                    <?php 
                    $username = $_SESSION['username'];
                    $user_image_query = "SELECT * FROM `usertable` WHERE username='$username'";
                    $user_image_result = mysqli_query($con, $user_image_query);
                    $row_image = mysqli_fetch_array($user_image_result);
                    $user_image = $row_image['user_image'];
                    echo "<li class='nav-item'>
                            <img src='./user_images/$user_image' class='profile_img my-4'>
                        </li>";
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?show_pending=true">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
                if (isset($_GET['show_pending']) && $_GET['show_pending'] == 'true') {
                    get_user_order_details();
                }
                ?>
                <?php
                if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }
                if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }
            if(isset($_GET['delete_account'])){
                include('delete_account.php');
            }

            ?>
            </div>
        </div>
       
                <?php include('../includes/footer.php'); ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
