<?php
include('../includes/connect.php');
include('../functions/common_function.php');

// Get user's IP address
$user_ip = getIPAddress();

// Fetch user details based on IP
$get_user = "SELECT * FROM `usertable` WHERE user_ip='$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-primary, .btn-success {
            width: 45%;
            white-space: nowrap; /* Ensure button text stays on one line */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .delivery-message {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-dark mb-4">Payment Options</h2>
        <div class="row">
            <div class="col-md-6">
                <!-- Online Payment Button -->
                <button class="btn btn-primary">Online Payment</button>
            </div>
            <div class="col-md-6">
                <!-- Offline Payment Button -->
                <a href="order.php?user_id=<?php echo $user_id; ?>">
                    <button class="btn btn-success">Pay Offline</button>
                </a>
            </div>
        </div>
        <!-- Delivery Message -->
        <div class="delivery-message">Free delivery on orders above Rs.300</div>
    </div>

    <script>
        // Handle Online Payment Button Click
        document.querySelector('.btn-primary').addEventListener('click', function() {
            // Show alert for online payment unavailability
            alert('Online payment option is currently unavailable.');
        });
    </script>
</body>
</html>
