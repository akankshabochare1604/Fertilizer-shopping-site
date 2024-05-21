<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
<thead>

<?php
$get_payments="Select * from `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_couont=mysqli_num_rows($result);


if($row_couont==0){
    echo "<h2 class='text-center text-signal mt-5'>NO PAYMENTS RECEIVED YET!</h2>";
}else{
    echo"
<tr>
<th>Sr no</th>
<th>Invoice  number</th>
<th>Amount</th>
<th>Payment mode</th>
<th>Order date</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
      $payment_mode=$row_data['payment_mode'];
      $order_date=$row_data['date'];
       $number++;

       echo "   <tr>
       <td>  $number</td>
      
       <td> $invoice_number</td>
       <td> $amount</td>
       <td>$payment_mode</td>
       <td> $order_date</td>
       <td> <a href=''><i class='fas fa-trash'></i> </a></td>
   </tr>";
    }
}
?>




   
</tbody>
</table>