<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
    $email = $_SESSION['email'];
    $get_user = "Select * from `customer` where `email` = '$email'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user id'];

?>
    <h3 class="text-dark">All my Orders</h3>
    <table class = "table table-bordered mt-5">
        <thead style="background-color: #d1f2eb; border:2px; border-style:solid; border-color: #FFFFFF;">
        <tr>
            <th>Sl No.</th>
            <th>Order Number</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Order Status</th>
            <th>Payment</th>
        </tr>
        </thead>
        <tbody class="bg-light text-dark">
        <?php
    $get_order_details = "SELECT * FROM `orders` WHERE `user id`=$user_id";
    $result_orders = mysqli_query($con, $get_order_details);
    $number = 1;
    while($row_data = mysqli_fetch_assoc($result_orders)){
        $order_id = $row_data['order_id'];
        $amount_due = $row_data['amount_due'];
        $total_products = $row_data['total_products'];
        $invoice_number = $row_data['invoice_number'];
        $order_date = $row_data['order_date'];
        $order_status = $row_data['order_status'];
        if($order_status == 'pending'){
            $order_status = 'Incomplete';
        }else{
            $order_status = 'Complete';
        }
        echo "<tr>
                <td>$number</td>
                <td>$order_id</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                ?>
                <?php
                if($order_status == 'Complete'){
                    echo "<td>Paid</td>";
                }else{
                echo "<td><a href = 'confirm_payment.php?order_id=$order_id' style='color: black;'>Confirm</a></td></tr>";
                }    
                
        $number++;
    }
?>

        </tbody>
    </table>
</body>
</html>