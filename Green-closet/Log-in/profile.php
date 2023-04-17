<?php
session_start(); 
//if not logged in - kick out
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include('../includes/connect.php');
include('../functions/common_function_r.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website using PHP and MySQL.</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
 <!-- navbar -->
 <?php require "./partials/navbar.php"?>
<?php
cart();
?>


<!-- tagline -->
<div class="bg-light" style="background-color: #d1f2eb;">
    <h3 class="text-center" style="font-size: 24px;"></h3>
    <p class="text-center" style="font-size: 30px border:3px; border-style:solid; border-color:#d1f2eb; padding: 1em;"> ~ Fashion that fits your soul ~</p>
</div>


<!-- side nav -->
<div class="row">
<div class="col-md-2 p-0" style="background-color: #d1f2eb;">
    <ul class="navbar-nav text-center" >
        <li class="nav-item" style ="border:3px; border-style:solid; border-color:#FFFFFF; padding: 1em;">
            <strong>Your Profile</strong>
        </li>
        <li class="nav-item" style ="border:3px; border-style:solid; border-color:#FFFFFF; padding: 1em;">
            <a href="profile.php" class="nav-link text-dark">Pending Orders</a>
        </li>
        <li class="nav-item" style ="border:3px; border-style:solid; border-color:#FFFFFF; padding: 1em;">
            <a href="profile.php?edit_account" class="nav-link text-dark">Edit Account</a>
        </li>
        <li class="nav-item" style ="border:3px; border-style:solid; border-color:#FFFFFF; padding: 1em;">
            <a href="profile.php?my_orders" class="nav-link text-dark">My Orders</a>
        </li>
        <li class="nav-item" style ="border:3px; border-style:solid; border-color:#FFFFFF; padding: 1em;">
            <a href="profile.php?delete_account" class="nav-link text-dark">Delete Account</a>
        </li>
        <li class="nav-item" style ="border:3px; border-style:solid; border-color:#FFFFFF; padding: 1em;">
            <a href="logout.php" class="nav-link text-dark">Logout</a>
        </li>
    </ul> 
</div>

    <div class="col-md-10 text-center">
    <?php
    get_user_order_details();
    if(isset($_GET['edit_account'])){
        include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
        include('orders.php');
    }
    if(isset($_GET['delete_account'])){
        include('delete_account.php');
    }
    //if(isset($_GET['pending_orders'])){
      //include('pending_orders.php');
    //}
    ?>
    </div>
</div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>