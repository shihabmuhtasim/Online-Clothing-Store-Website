<?php
session_start(); 
//if not logged in - kick out
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;}
include('../includes/connect.php');
include('../functions/common_function_r.php');
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    echo $user_id;
}

//getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "Select * from `cart_details` where ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($con,$cart_query_price);
$invoice_number = mt_rand(); 
$status = 'pending';
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
$insert_orders = "INSERT INTO `orders` (`user id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES ('$user_id', '$subtotal', '$invoice_number', '$count_products', NOW(), '$status')";
$result_query5 = mysqli_query($con, $insert_orders);
if($result_query5){
    echo '<script>alert("Orders are submitted successfully!")</script>';
    echo '<script>window.open("profile.php","_self")</script>';
}

//orders pending

$insert_orders_pending = "INSERT INTO `orders_pending` (`user id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES ('$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
$result_query6 = mysqli_query($con, $insert_orders_pending);


//delete items from cart

$empty_cart = "Delete from `cart_details` where ip_address = '$get_ip_address'";
$result_query7 = mysqli_query($con, $empty_cart);
?>

