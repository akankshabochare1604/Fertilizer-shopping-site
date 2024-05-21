<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
<thead>

<?php
$get_orders="Select * from `user_orders`";
$result=mysqli_query($con,$get_orders);
$row_couont=mysqli_num_rows($result);


if($row_couont==0){
    echo "<h2 class='text-center text-signal mt-5'>NO ORDERS YET!</h2>";
}else{
    echo"
<tr>
<th>Sr no</th>
<th>Due Amount</th>
<th>Invoice  number</th>
<th>Total Products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
       $number++;

       echo "   <tr>
       <td>  $number</td>
       <td> $amount_due</td>
       <td> $invoice_number</td>
       <td> $total_products</td>
       <td> $order_date</td>
       <td>  $order_status</td>
       <td> <a href=''><i class='fas fa-trash'></i> </a></td>
   </tr>";
    }
}
?>




   
</tbody>
</table>