<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="Select * from `usertable` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    // echo $user_id;
    
    
    ?>
<h3 class="text-success text-center mt-2 mb-0">All orders</h3>
<table class="table table-bordered mt-3">
    <thead class="bg-dark text-light">
        <tr >
        <th>Sr.No</th>
        <th>Amount due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>date</th>
        <th>Comlete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $get_order_details="Select * from `user_orders` where user_id=$user_id";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
           $order_id=$row_orders['order_id'];
           $amount_due=$row_orders['amount_due'];
           $total_products=$row_orders['total_products'];
           $invoice_number=$row_orders['invoice_number'];
           $order_status=$row_orders['order_status'];
           if($order_status=='pending'){
            $order_status='Incomplete';
           }
           else{
            $order_status='Complete';
           }
           $order_date=$row_orders['order_date'];
        
           echo " <tr>
           <td> $number</td>
           <td>$amount_due</td>
           <td>$total_products</td>
           <td> $invoice_number</td>
           <td>$order_date</td>
           <td> $order_status</td>";
           ?>
           <?php
           if($order_status=='Complete'){
            echo "<td>Paid</td>";
           }else{
           echo "<td> <a href='confirm_payment.php?order_id=$order_id' >confirm</a></td></tr>";
        }
       $number++;
        }


        ?>
       
    </tbody>
</table>
</body>
</html>