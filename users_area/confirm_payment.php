<!--connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result= mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

}
if(isset($_POST['confirm_payment'])){
$invoice_number=$_POST['invoice_number'];
$amount=$_POST['amount'];
$payment_mode=$_POST['payment_mode'];
$insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values($order_id, $invoice_number,$amount,'$payment_mode')";
$result=mysqli_query($con,$insert_query);
if($result){
    echo "<script>alert('Successfully completed the payment!')</script>";
    echo "<script>window.open('profile.php?my_orders','_self')</script>";
}
$update_orders="update `user_orders` set order_status='complete' where order_id=$order_id";
$result_orders=mysqli_query($con,$update_orders);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body class="bg-secondary">
    <h1 class="text-center text-light ">Confirm payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <label for=""class="text-light">Invoice Number </label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                value="<?php  echo $invoice_number;    ?>" >
            </div>
           
            <div class="form-outline my-4 text-center w-50 m-auto ">
            <label for="" class="text-light" >Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php  echo $amount_due ;   ?> ">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto" >
            <select name="payment_mode" class="form-select w-50 m-auto" >
                <option> Select Payment mode</option>
                <option>UPI</option>
                <option>Net Banking</option>
                <option>Cash On Delivery</option>
                <option> Pay Offline</option>
            </select>
            </div>


            <div class="form-outline my-4 text-center w-50 m-auto ">
            <input type="submit" class="bg-info py-2 px-3 border-0 " value="Confirm" name="confirm_payment" >
            </div>


        </form>
    </div>
    
</body>
</html>