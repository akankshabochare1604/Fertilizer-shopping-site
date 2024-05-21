<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroMart - Online Fertilizer Shopping Site</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0"><!--fluid will fill all the width-->
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
<img src="./images/agromart logo.png" alt="" class="logo"><!--here we used 1 dot(.)coz img folder and this file are located in samre folder at same level-->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-5">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
if(isset($_SESSION['username'])){
  echo "   <li class='nav-item'>
  <a class='nav-link' href='./users_area/profile.php'>My Account </a>
</li>";
}else{
  echo "   <li class='nav-item'>
  <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
</li>";
}
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li> -->
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"><sup><?php cart_item();?></sup></i></a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="contact_process.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="fas fa-shopping-cart"></i>
            <sup><?php echo cart_item(); ?></sup>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price() ?></a>
        </li>
         </ul>
      <form class="d-flex" action="search_product.php" method="get" >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
       

        <input type="submit" value="Search" class="btn btn-outline-primary" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- cart calling function -->
<?php
cart();
?>  
<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <!-- <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li> -->
        <?php
        if(!isset($_SESSION['username'])){
          echo "  <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>  ";
                 }else{
                   echo "                <li class='nav-item'>
                   <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                   </li>";
                 }
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li> -->
        <?php   
        if(!isset($_SESSION['username'])){
 echo "                <li class='nav-item'>
 <a class='nav-link' href='./users_area/user_login.php'>Login</a>
 </li>";
        }else{
          echo "                <li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
          </li>";
        }
        ?>
    </ul>
</nav>

<!--third child-->
<div class="bg-light">
    <h3 class="text-center"><b>Agro Store</b></h3>
    <p class="text-center"><i>Organic Fertilizers: Good for your plants,Good for the planet</i></p>
</div>


<!--fourth child-->
<div class="row px-1">
    <div class="col-md-10">
        <!--products-->
        <div class="row">
<!--fetching products-->
        <?php
       getproducts();//calling function
       get_unique_categories();
       get_unique_deliveryPart();
//        $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
        ?>

<!--row end-->
</div>
<!--column end-->
</div>

    
    <div class="col-md-2 bg-secondary p-0 ">
        <!--sidenav-->
        <ul class="navbar-nav me-auto text-center">
            
        <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4><b>Delivery Partners</b></h4></a>
            </li>
            <?php
          getdeliveryPart();
         
            ?>   
        </ul>
        
        <!--categories-->
        <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info ">
                <a href="#" class="nav-link text-light"><h4><b>Categories</b></h4></a>
            </li>
            <?php
            getcategories();
            
            ?> 
         </ul>
  </div>
</div>






<!-- last child-->
<!--include footer-->
<?php
include('./includes/footer.php');
?>
</div>


   



<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>