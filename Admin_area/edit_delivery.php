<?php
if(isset($_GET['edit_delivery'])) {
    $edit_brand=$_GET['edit_delivery'];
    // echo $edit_category;
    $get_brands="select * from `delivery` where delivery_id= $edit_brand ";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['delivery_title'];
    // echo $category_title;


}
if(isset($_POST['edit_delivery'])) {
    $brand_title=$_POST['delivery_title'];

    $update_query="update `delivery` set delivery_title=' $brand_title' where 
    delivery_id=$edit_brand ";
    $result_brand=mysqli_query($con,$update_query);
    if ($result_brand){
        echo "<script>alert( 'Delivery Partner is been updated successfully')</script>";
        echo "<script>window.open( './index.php?view_delivery','_self')</script>";
    }
}






?>

<div class="container mg-3">
    <h1 class="text-center">Edit Delivery Partner</h1>
    <form action="" method="post" class="text-center" >
        <div class="form-outline mb-4 w-50 m-auto ">
            <label for="delivery_title" class="form-label">Delivery Partner Name</label>
            <input type="text" name="delivery_title" id="delivery_title" class="form-control"
            required="required" value='<?php echo $brand_title; ?>'>
        </div>
        <input type="submit" value="Update Delivery Partner" class="btn btn-info px-3 mb-3"
         name="edit_delivery" >
    </form>
</div>