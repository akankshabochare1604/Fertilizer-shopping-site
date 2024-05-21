<?php
session_start();

session_unset();

session_destroy();
echo "<script>alert('YOU ARE LOGGED OUT')</script>";
echo "<script>window.open('../home.php','_self')</script>";
?>