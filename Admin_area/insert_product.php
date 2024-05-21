<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $delivery_partners=$_POST['delivery_partners'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];


    //accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $delivery_partners=='' or $product_price=='' or $product_image1=='' or $product_image2==''or $product_image3==''){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,delivery_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$product_keywords','$product_category','$delivery_partners','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Product is inserted successfully!!')</script>";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
     <!--  bootstrrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--css file link for logo size-->
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light mt-3" style="background-image: url('../images/background.jpg'); background-size: cover; background-position: center;"> <!--mt stands for top margin-->
<!-- 
<div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-6 col-lg-5 ">
                <img src="../images/background.jpg" alt="admin registration" 
                class="img-fluid" >
            </div> -->
    <div class="container">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <!--title-->
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product name" autocomplete="off" required>
                </div>

                <!--description-->
                <div class="form-outline mb-4 w-50 m-auto">
                
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required>
                </div>

            <!--keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required>
                </div>
                <!--categories-->
                <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select category</option>
                    <?php
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                 ?>
            </select>
                </div>

                <!--delivery Partners-->
                <div class="form-outline mb-4 w-50 m-auto">
                <select name="delivery_partners" id="" class="form-select">
                    <option value="">Select Delivery Partner</option>
                    <?php
                    $select_query="Select * from `delivery`";
                    $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $delivery_title=$row['delivery_title'];
                    $delivery_id=$row['delivery_id'];
                    echo "<option value='$delivery_id'>$delivery_title</option>";
                }
                 ?>
                   
                        </select>
                 </div>
<!--Product image 1-->
                 <div class="form-outline mb-4 w-50 m-auto">
                
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  required>
                </div>
                <!--Product image 2-->
                <div class="form-outline mb-4 w-50 m-auto">
                
                <label for="product_image2" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required>
                </div>
                <!--Product image 3-->
                <div class="form-outline mb-4 w-50 m-auto">
                
                <label for="product_image3" class="form-label">Product Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required>
                </div>
                <!--price -->
            <div class="form-outline mb-4 w-50 m-auto">
                
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
                </div>
<!--price -->
<div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class=" btn btn-info mb-3" value="insert Product" >        
                
                </div>

        </form>
    </div>
    
</body>
</html>