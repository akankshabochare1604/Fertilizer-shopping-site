<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Delete account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto bg-danger text-dark" name="delete" value="Delete account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto bg-info text-dark" name="dont_delete"
             value="Don't Delete account">
        </div>

    </form>



    <?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `usertable` where username='$username_session'";
        $result=mysqli_query($con,$delete_query );
        if($result){
            session_destroy();
            echo "<script> alert ('Account deleted successfully!!')</script>";
            echo "<script>window.open('../home.php','_self')</script>";
        }

    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php ','_self')</script>";
    }


    ?>
</body>
</html>