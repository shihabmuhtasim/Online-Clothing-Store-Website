<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "Select * from `orders` where order_id = $order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
    $invoice_number = $row_fetch['invoice_number'];

}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT into `payments` (order_id,invoice_number,amount,payment_mode) values ($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result){
        // if ($result == 'paypal'){
        //     echo "<script>window.open('paypal.php?amount=$amount','_self')</script>";
        // }
        echo "<h3 class = 'text-center text-light'>Successfully completed the payment!!</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "UPDATE `orders` SET order_status ='Complete' where order_id=$order_id";
    $result_orders = mysqli_query($con, $update_orders);
}
?>
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
</head>
<body style="background-color: #d1f2eb;">
<div class="container my-5">
    <h1 class="text-center text-dark">
        Confirm Payment
    </h1>
    <form action="" method = "post">
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class = "form-control w-50 m-auto" name = "invoice_number" value = "<?php  echo $invoice_number?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-dark"><strong>Amount</strong></label>
            <input type="text" class = "form-control w-50 m-auto" name = "amount" value = "<?php  echo $amount_due?>">
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" class ="form-select w-50 m-auto">
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>NET Banking</option>
                <option>Paypal</option>
                <option>Cash On Delivery</option>
            </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" class = "bg-dark py-2 px-3 border-1" name = "confirm_payment" value = "Confirm">
        </div>
    </form>
</div>
    
</body>
</html>
