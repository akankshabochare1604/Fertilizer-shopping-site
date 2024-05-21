<?php

if(isset($_GET['delete_delivery'])) {
$delete_delivery=$_GET['delete_delivery'];
// echo $delete_category;

$delete_query="delete from `delivery` where delivery_id=$delete_delivery ";
$result=mysqli_query($con,$delete_query);
if($result) {
    echo "<script>alert( 'Delivery Partner  is been deleted successfully')</script>";
        echo "<script>window.open( './index.php?view_delivery','_self')</
        script>";
    
}

}

?> 