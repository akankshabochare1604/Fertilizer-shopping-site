<?php


//including connection file
// include('./includes/connect.php');

//getting products

function getproducts(){
global $con;

//condition to check isset or not
if(!isset($_GET['category'])){
if(!isset($_GET['delivery'])){

$select_query="Select *from `products` order by rand() limit 0,20";
$result_query=mysqli_query($con,$select_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $delivery_id=$row['delivery_id'];
 echo "<div class='col-md-3 mb-3'>
 <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'><h5><b>$product_description</h5></b></p>
            <p class='card-text'><h5><b>Price:$product_price/-</h5></b></p>
            <a href=''home.php?add_to_cart=$product_id'' class='btn btn-primary'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
           </div>
</div>
</div> ";
}
}
}
}

//getting all products
function get_all_products(){
    global $con;

//condition to check isset or not
if(!isset($_GET['category'])){
if(!isset($_GET['delivery'])){

$select_query="Select *from `products` order by rand() ";
$result_query=mysqli_query($con,$select_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $delivery_id=$row['delivery_id'];
 echo "<div class='col-md-3 mb-3'>
 <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'><h5><b>$product_description</h5></b></p>

            <p class='card-text'><h5><b>Price:$product_price/-</h5></b></p>
            <a href='home.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
           </div>
</div>
</div> ";
}
}
}
}

//getting uniquecategories
function get_unique_categories(){
    global $con;
    
    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
  
    
    $select_query="Select *from `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'> No Stock For This Category!!!</h2>";

    }

   
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $delivery_id=$row['delivery_id'];
     echo "<div class='col-md-3 mb-3'>
     <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
               <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'><h5><b>$product_description</h5></b></p>

                <p class='card-text'><h5><b>PRice:$product_price/-</h5></b></p>
                <a href='home.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
               </div>
    </div>
    </div> ";
    }
    }
    }

function getdeliveryPart(){
    global $con;
    $select_del_part="Select * from `delivery`";
    $result_del_part=mysqli_query($con,$select_del_part);
    
    while($row_data=mysqli_fetch_assoc( $result_del_part))
    {
      $delivery_title=$row_data['delivery_title'];
      $delivery_id=$row_data['delivery_id'];
      echo " <li class='nav-item'>
      <a href='home.php?delivery=$delivery_id' class='nav-link text-light'>$delivery_title</a>
  </li>";
    }
}
//displaying unique delivery partners in sidenav
function get_unique_deliveryPart(){
    global $con;
    
    //condition to check isset or not
    if(isset($_GET['delivery'])){
        $delivery_id=$_GET['delivery'];
  
    
    $select_query="Select *from `products` where delivery_id=$delivery_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'> OOPS!Currently No Products are available To Sell From This Partner!!!</h2>";

    }

   
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $delivery_id=$row['delivery_id'];
     echo "<div class='col-md-3 mb-3'>
     <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
               <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'><h5><b>$product_description</h5></b></p>

                <p class='card-text'><h5><b>Price:$product_price/-</h5></b></p>
                <a href='home.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
               </div>
    </div>
    </div> ";
    }
    }
    }
    


////displaying categories in sidenav
function getcategories(){
    global $con;

    $select_categories="Select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories); 
            // $row_data=mysqli_fetch_assoc( $result_del_part);
            // echo $row_data['delivery_title'];
            // echo $row_data['delivery_title'];
            while($row_data=mysqli_fetch_assoc( $result_categories))
            {
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
              echo " <li class='nav-item'>
              <a href='home.php?category=$category_id' class='nav-link text-light'>$category_title</a>
          </li>";
            }
}


//searching product
function search_product(){
global $con;
if(isset($_GET['search_data_product'])){
$search_data_value= $_GET['search_data'];

$search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);

$num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'> OOPS!Currently No Products are available from this category !!!</h2>";

    }
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $delivery_id=$row['delivery_id'];
 echo "<div class='col-md-3 mb-3'>
 <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'><h5><b>$product_description</h5></b></p>

            <p class='card-text'><h5><b>Price:$product_price/-</h5></b></p>
            <a href='home.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more...</a>
           </div>
</div>
</div> ";
}
}
}

//view details function
function view_details(){
      global $con;
        
        //condition to check isset or not
        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
        if(!isset($_GET['delivery'])){
            $product_id=$_GET['product_id'];
        
        $select_query="Select *from `products` where product_id=$product_id ";
        $result_query=mysqli_query($con,$select_query);
      
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $delivery_id=$row['delivery_id'];
         echo "<div class='col-md-3 mb-3'>
         <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'><h5><b>$product_description</h5></b></p>

                    <p class='card-text'><h5><b>Price:$product_price/-</h5></b></p>
                    <a href='home.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='home.php' class='btn btn-secondary'>Go home..</a>
                   </div>
        </div>
        </div> 
        
        <div class='col-md-8'>
           
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-dark mb-5'>Related Images</h4>
                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class=col-md-6'>
                <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
            </div>
        </div>";
        }
        }
        }
        }
    } 
//get ipadress function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function 
function cart(){
    
if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('Item already present inside the cart')</script>";
  echo "<script>window.open{'home.php','_self'}</script>";
    }else{
        $insert_query="insert into `cart_details`(product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',0)";
        $result_query=mysqli_query($con,$insert_query);
       
        echo "<script>alert('Item is added to the cart')</script>";
        echo "<script>window.open{'home.php','_self'}</script>";

    }
}
}


//function to get item numbers
function cart_item(){
    global $con;
    if(isset($_GET['add_to_cart'])){
        
        $get_ip_add = getIPAddress(); 
       
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        
        }else{
            global $con;
            $get_ip_add = getIPAddress(); 
           
            $select_query="Select * from `cart_details` where ip_address='$get_ip_add' ";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
    
        }
        echo $count_cart_items;
    }
    

//total price function
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    
    
    $total_price=00;
   $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
   $result=mysqli_query($con,$cart_query);

   while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);

    while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price += $product_values;

   }
   }
   echo $total_price;
}
//get user order details
// function get_user_order_details(){
//     global $con;
//     $username=$_SESSION['username'];
//     $get_details="Select * from `usertable` where username='$username'";
//     $result_query=mysqli_query($con,$get_details);
// while($row_query=mysqli_fetch_array($result_query)){
//     $user_id=$row_query['user_id'];
//     if(!isset($_GET['edit_account'])){
//     if(!isset($_GET['my_orders'])){
//     if(!isset($_GET['delete_account'])){
//         $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
//         $result_orders_query=mysqli_query($con,$get_orders);
//         $row_count=mysqli_num_rows($result_orders_query);
//         if($row_count>0){
//             echo "<h3 class='text-center text-success>You have <span class='text-danger'>$row_count</span> pending orders </h3>
//             <p><a href='profile.php?my_orders'>order Details </a></p>";
//         }else{
//             echo "<h3 class='text-center text-success>You have 0 pending orders </h3>
//             <p><a href='../home.php'>Explore More </a></p>";
//         }

//     }
// }
// }
// }
// }
function get_user_order_details(){
    global $con;
    
    // Get username from session
    $username = $_SESSION['username'];
    
    // Query to fetch user details
    $get_details_query = "SELECT * FROM `usertable` WHERE username='$username'";
    $get_details_result = mysqli_query($con, $get_details_query);
    
    // Check for errors in user details query
    if (!$get_details_result) {
        echo "Error fetching user details: " . mysqli_error($con);
        return;
    }
    
    // Fetch user details
    $row_query = mysqli_fetch_array($get_details_result);
    
    // Check if user details were fetched successfully
    if (!$row_query) {
        echo "User details not found for username: $username";
        return;
    }
    
    // Get user ID
    $user_id = $row_query['user_id'];
    
    // Query to fetch pending orders count
    $get_orders_query = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
    $get_orders_result = mysqli_query($con, $get_orders_query);
    
    // Check for errors in pending orders query
    if (!$get_orders_result) {
        echo "Error fetching pending orders: " . mysqli_error($con);
        return;
    }
    
    // Count pending orders
    $pending_orders_count = mysqli_num_rows($get_orders_result);
    
    // Display pending orders count
    if($pending_orders_count > 0){
        echo "<h3 class='text-center text-success'>You have <span class='text-danger'>$pending_orders_count</span> pending orders </h3>
        <p><a href='profile.php?my_orders'>Order Details</a></p>";
    } else {
        echo "<h3 class='text-center text-success'>You have 0 pending orders </h3>
        <p class='text-center'><a href='../home.php'>Explore More</a></p>";
    }
}


?>