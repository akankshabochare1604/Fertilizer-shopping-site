<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_products="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_products);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $delivery_id=$row['delivery_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
   
//fetching category id
$select_category="Select * from `categories` where category_id=$category_id";
$result_category=mysqli_query($con,$select_category);
$row_category=mysqli_fetch_assoc($result_category);
$category_title=$row_category['category_title'];
// echo $category_title;

//fetching delivery id
$select_delivery="Select * from `delivery` where delivery_id=$delivery_id";
$result_delivery=mysqli_query($con,$select_delivery);
$row_delivery=mysqli_fetch_assoc($result_delivery);
$delivery_title=$row_delivery['delivery_title'];
// echo $delivery_title;

}

?>



<div class="container mt-5 mb-3">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text"  id="product_title"  value="<?php echo $product_title?>"name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text"  id="product_description" value="<?php echo $product_description?>"name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text"  id="product_keywords" value="<?php echo $product_keywords?>"name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product categories</label>
          <select name="product_category" class="form-select" >
         
            <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
            <?php
//fetching category id
$select_category_all="Select * from `categories` ";
$result_category_all=mysqli_query($con,$select_category_all);
while($row_category_all=mysqli_fetch_assoc($result_category_all)){
    $category_title=$row_category_all['category_title'];
    $category_id=$row_category_all['category_id'];
echo "<option value='$category_id'> $category_title</option>";


}



?>
            
          </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_delivery_partner" class="form-label">Delivery Partners</label>
          <select name="product_delivery_partner" class="form-select">
         
            <option value="<?php echo $delivery_title?>"><?php echo $delivery_title?></option>
            <?php
//fetching category id
$select_delivery_all="Select * from `delivery` ";
$result_delivery_all=mysqli_query($con,$select_delivery_all);
while($row_delivery_all=mysqli_fetch_assoc($result_delivery_all)){
    $delivery_title=$row_delivery_all['delivery_title'];
    $delivery_id=$row_delivery_all['delivery_id'];
echo "<option value='$delivery_id'> $delivery_title</option>";


}



?>
            
          </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
 <input type="file"  id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
<img src="../images/<?php echo $product_image1?>" alt="" class="product_img">

 </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
 <input type="file"  id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
<img src="../images/<?php echo $product_image2?>" alt="" class="product_img">

 </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
 <input type="file"  id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
<img src="../images/<?php echo $product_image3?>" alt="" class="product_img">

 </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text"  id="product_price" value="<?php echo $product_price?>/-"name="product_price" class="form-control" required="required">
        </div>
        <div class="text-center w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info m-2">
        </div>
        
        
    </form>
</div>
<?php
if(isset($_POST['edit_products'])){
    $product_title=$_POST['product_title'];
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_delivery_partner'];
    
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];

    // checking fo fields empty or not
if ($product_title=="" or $product_description==" " or $product_keywords=="" or
$product_category=="" or $product_brand=="" or $product_image1=="" or $product_image2==""
or $product_image3=="" or $product_price=="")
{
echo "<script>alert('Please fill all the fileds and continue the process')</script>";
}else{
move_uploaded_file($tmp_image1,"./product_images/$product_image1"); 
move_uploaded_file($tmp_image2,"./product_images/$product_image2");
move_uploaded_file($tmp_image3,"./product_images/$product_image3");

//query to update products
$update="Update `products` set category_id=$category_id,delivery_id=$delivery_id,product_image1='$product_image1', product_image2='$product_image2',
product_image3='$product_image3', product_price='$product_price', date=NOW() where product_id=$edit_id";
$result_update=mysqli_query($con,$update);
if($result_update){
    echo "<script>alert('Product updated successfully!')</script>";
    echo "<script>window.open('./insert_product.php','_self')</script>";
}
}

}
?>