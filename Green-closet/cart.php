<?php
include('includes/connect.php');
include('./functions/common_function.php');
session_start();
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
    <?php
// storing the log in status to diffrenciate 
if (session_status() == PHP_SESSION_NONE) {
  $login_status=false;
}
else{
  if (isset($_SESSION) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    $login_status=true;
  }
  else{
    $login_status=false;
  }
}
?>
<?php require "Log-in/partials/navbar.php"?>
<?php
cart();
?>
    <!-- navbar -->
    <div class="container-fluid">
        <!-- first child -->
        

<!-- tagline -->
<div class="bg-light" style="background-color: #00FF00;">
    <h3 class="text-center" style="font-size: 24px;"></h3>
    <p class="text-center" style="font-size: 30px;"> ~ Fashion that fits your soul ~</p>
</div>


<!-- side nav -->

<div class="container">
    <div class="row">
    <form action="" method="post">
        
        <table class="table table-bordered text-center">
            
                <?php
                
$get_ip_add = getIPAddress();
$total_price=0;
$cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
    echo"
    
    <thead>
    <tr>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>
    </tr>
</thead>
<tbody>";


while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
$product_price=array($row_product_price['product_price']);
$price_table=$row_product_price['product_price'];
$product_title=$row_product_price['product_title'];
$product_image1=$row_product_price['product_image1'];
$product_values=array_sum($product_price);
$total_price+=$product_values;
?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" style="width: 90px; height: 90px;"></td>
                    <td><input type="text" name="qty" class="form-input w-50" ></td>
                    <?php
$get_ip_add = getIPAddress();
if(isset($_POST['update_cart'])){
    $quantities=$_POST['qty'];
    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
    $result_products_quantity=mysqli_query($con,$update_cart);
    $total_price=$total_price*$quantities;
}                    
                    ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td style="display: flex;">
                        <input type="submit" value="Update Cart" class="bg-secondary px-3 py-2 border-0 mx-3 text-light" name="update_cart">
                        <input type="submit" value="Remove Cart" class="bg-secondary px-3 py-2 border-0 mx-3 text-light" name="remove_cart">
                    </td>
                </tr>
<?php }}}
else{
    
    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}
?>
               
            </tbody>
    </table>
            <div class="d-flex mb-5">
                <?php
            $get_ip_add = getIPAddress();
            
            $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
            $result=mysqli_query($con,$cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){ ?>
                <h4 class='px-3'>Subtotal:<strong class='text-info'><?php echo $total_price ?>/-</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-Pale green px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <a href='./Log-in/checkout.php?price=<?php echo $total_price?>' class = 'text-dark text-decoration-none'><button class='bg-Pale green px-3 py-2 border-0 mx-3 '>Checkout</a></button>
           <?php
              }else{
                echo  "<input type='submit' value='Continue Shopping' class='bg-secondary px-3 py-2 border-0 mx-3' name='continue_shopping'>";
            }
            if(isset($_POST['continue_shopping'])){
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                    echo "<script>window.open('index.php','_self')</script>";
                }
                else{
                echo "<script>window.open('index2.php','_self')</script>";}

            }
            ?> 

            </div>
    </div>
</div>
    </form>


    <?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();
?>







<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>