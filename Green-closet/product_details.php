<?php
include('includes/connect.php');
include('functions/common_function.php');
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
    <!-- connect navigration bar-->
    <?php require "Log-in/partials/navbar.php"?>

    <!-- navbar -->
    <div class="container-fluid">
        <!-- first child -->
        

<!-- tagline -->
<div class="bg-light" style="background-color: #00FF00;">
    <h3 class="text-center" style="font-size: 24px;"></h3>
    <p class="text-center" style="font-size: 30px;"> ~ Fashion that fits your soul ~</p>
</div>


<!-- side nav -->


<div class="row px-2">
<div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
        <a href="#" class="nav-link bg-light"><h4>Categories</h4></a>
    </li>

    <?php
cart();
?>
    
<?php
getcategory();
?>
    </ul> 
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
        <a href="#" class="nav-link bg-light"><h4>Apparels</h4></a>
    </li>


    
<?php
getapparel();
?>
    </ul> 






    </div>
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
            

        <?php
view_details();
get_unique_categories();
get_unique_apparels();


?>
            

<!-- row end -->

</div>
<!-- col end -->
</div>

</div>


















<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>