<?php
include('../includes/connect.php');
if(isset($_POST['insert_deli_part'])){
   $delivery_title=$_POST['deli_title'];
   
   //select data from database
  $select_query="Select * from `delivery` where delivery_title='$delivery_title'";
  $result_select=mysqli_query($con,$select_query);
   $number=mysqli_num_rows($result_select);
   if($number>0){
    echo "<script>alert('This delivery partner is already present in database')</script>";
   }else{
   
   $insert_query="insert into `delivery` (delivery_title) values ('$delivery_title')";
   $result=mysqli_query($con,$insert_query);
   if($result){
    echo "<script>alert('Delivery Partner has been inserted successfully')</script>";
   }
}
}
?>
<h2 class="text-center">Insert Delivery Partners</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="deli_title" placeholder="Insert Delivery Partners" aria-label="Insert Delievery Partners" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">

<input type="submit" class="bg-info p-2 border-0" name="insert_deli_part" value="Insert Delivery Partners" aria-label="Insert Delivery Partners"  >
</div>
  </div>
</form>