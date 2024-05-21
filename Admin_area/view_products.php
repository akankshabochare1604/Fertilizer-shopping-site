<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<body>
    <h1 class="text-center text-success " > All Products </h1>
    <table class="table table-bordered mt-2">
    <thead class="bg-info">
        <tr>
            <th>Product id </th>
            <th>Product title </th>
            <th>Product image </th>
            <th>Product price</th>
            <th>Product sold </th>
            <th>Status</th>
            <th> Edit </th>
            <th> Delete</th>
</tr >
</thead>
<tbody >
    <?php
$get_products="Select * from `products`";
$result=mysqli_query($con,$get_products);
$number=0;
while($row_products=mysqli_fetch_assoc($result)){
    $product_id=$row_products['product_id'];
    $product_title=$row_products['product_title'];
    $product_image1=$row_products['product_image1'];
    $product_price=$row_products['product_price'];
    $status=$row_products['status'];
    $number++;
    ?>
    <tr class='text-center'>
    <td><?php echo $number;?></td>
    
    <td><?php echo $product_title;?></td>
    <td><?php echo "<img src='./product_images/$product_image1'";?> class='product_img'></td>
    <td> <?php echo $product_price;?>/-</td>
    <td>
        <?php
        $get_count="Select * from `orders_pending` where product_id=$product_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;
        ?>
    </td>
    
    <td><?php echo $status;?></td>
    <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fas fa-edit'></i></a>
    </td>
    <td><a href='index.php?delete_product=<?php echo $product_id?>' class='text-dark'><i class='fas fa-trash'></i></a></td>
    
    
    </tr>
<?php
}
    ?>
    </tbody>

</table>
</body>
</html>