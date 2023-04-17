<?php

include('../includes/connect.php');
?>
<?php $price= $_GET['price']; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
        img{
            width: 90%
            margin: auto;
            display:block;
        }
    </style>
</head>
<body>
    <?php
    //global variable - shihab 
    $email = $_SESSION['email'];
    $get_user = "Select * from `customer` where `email` = '$email'";
    //
    $result3 = mysqli_query($con,$get_user);
    $run_query = mysqli_fetch_array($result3);
    
    $user_id = $run_query['user id'];
    ?>
    <!-- connect navigration bar-->
    <?php require "partials/navbar.php"?>

    <div class="container">
  <h2 class="text-center text-dark">Payment Options</h2>
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-6">
        <h3 class = "text-center">Online Payment</h3>
      <a href="Online/start.php?price=<?php echo $price?>" target="_blank">
      <img src="../images/online_payment.jpg" alt="" class="img-fluid align-center" style="max-width: 200px; max-height: 200px; object-fit: cover; justify-content: center;">

      </a>
    </div>
    <div class="col-md-6">
        <h3 class = "text-center">Cash on Delivery</h3>
      <a href="order.php?user_id= <?php echo $user_id ?>">
        <img src="../images/cod.jpg" alt="" class="img-fluid align-center" style="max-width: 200px; max-height: 200px; object-fit: cover; justify-content: center;">
      </a>
    </div>
  </div>
</div>


</body>
</html>