<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
<thead>

<?php
$get_orders="Select * from `usertable`";
$result=mysqli_query($con,$get_orders);
$row_couont=mysqli_num_rows($result);


if($row_couont==0){
    echo "<h2 class='text-center text-signal mt-5'>NO USERS YET!</h2>";
}else{
    echo"
<tr>
<th>Sr no</th>
<th>Username</th>
<th>User email</th>
<th>User Image</th>
<th>User Address</th>
<th>User Mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
      
       $number++;

       echo "   <tr>
       <td>  $number</td>
       <td>$username</td>
       <td> $user_email</td>
       <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'/></td>
       <td> $user_address</td>
       <td>  $user_mobile</td>
       <td> <a href=''><i class='fas fa-trash'></i> </a></td>
   </tr>";
    }
}
?>




   
</tbody>
</table>