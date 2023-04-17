<?php
session_start(); 
//if not logged in - kick out
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include('../partials/dbconnect.php');
include('../../functions/common_function_r.php');
?> 




<?php

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("green6436fbd8c6e35");
$store_passwd=urlencode("green6436fbd8c6e35@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);
	# TRANSACTION INFO
    $status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;
	
	//CODE STARTS HERE
	$email=$_SESSION['email'];
	$name=$_SESSION['name'];
	//GETTING USER ID:
	$user_id=$_SESSION['user_id'];
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<?php require "../partials/navbar.php"?>
		<h1 class="text-center text-success">Green Closet Online Orders</h1>
	<h2 class="text-center text-success">Online Tranzaction Successful</h2>
	<table class="table table-bordered mt-5">
	<thead class="bg-secondary text-light text-center">
		<tr>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Tranzaction ID</th>
			<th>Tranzaction Date</th>
			<th>Payment Method</th>
			<th>Status</th>	
			<th>Amount</th>	
		</tr>
		<tbody style="background-color: #eaf4f4; color: #333;">
	</body>
	</html		
<?php
		echo"
        <tr class='text-center'>
            <td>$name</td>
            <td>$email</td>
            <td>$tran_id</td>
            <td>$tran_date</td>
            <td>$card_type</td>
            <td>$status</td>  
            <td>$amount</td>                
            ";


//getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "Select * from `cart_details` where ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($con,$cart_query_price);
$invoice_number = mt_rand(); 
$status = 'Complete';
$count_products = mysqli_num_rows($result_cart_price);
while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_product = "Select * from `products` where product_id = $product_id";
    $run_price = mysqli_query($con,$select_product);
    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }

}
//getting quantity from cart
$get_cart = "Select * from `cart_details`";
$run_cart = mysqli_query($con,$get_cart);
$get_iem_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_iem_quantity['quantity'];
if($quantity == 0){
    $quantity = 1;
    $subtotal = $total_price;
}else{
    $quantity = $quantity;
    $subtotal = $total_price*$quantity;
}

$insert_orders = "INSERT INTO `orders` (`user id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES 
('$user_id', '$amount', '$invoice_number', '$count_products', NOW(), '$status')";
$result_query5 = mysqli_query($con, $insert_orders);

$insert_orders_pending = "INSERT INTO `orders_pending` (`user id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES 
('$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
$result_query6 = mysqli_query($con, $insert_orders_pending);

//delete items from cart

$empty_cart = "Delete from `cart_details` where ip_address = '$get_ip_address'";
$result_query7 = mysqli_query($con, $empty_cart);

$get_order_details = "SELECT * FROM `orders` WHERE `invoice_number`=$invoice_number";
$result_orders = mysqli_query($con, $get_order_details);
$row_data = mysqli_fetch_assoc($result_orders);
$order_id = $row_data['order_id'];

$insert_query = "INSERT into `payments` (order_id,invoice_number,amount,payment_mode) values 
($order_id, $invoice_number, $amount, '$card_type')";
$result = mysqli_query($con, $insert_query);
if ($result){
    echo "<h3 class = 'text-center text-light'>Successfully completed the payment!!</h3>";
    //echo "<script>window.open('success.php','_self')</script>";
}
}else {

	echo "Failed to connect with SSLCOMMERZ";
}

?>