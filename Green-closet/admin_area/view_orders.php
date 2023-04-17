<h1 class="text-center text-success">Green Closet Orders</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Customer Phone Number</th>
        <th>Customer Address</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Order Quantity</th>
        <th>Order status</th>
        <th>Order Date</th>
        <th>Payment Method</th>
        
        <th>Delete</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    <?php 
    $get_cus="select * from ((((orders_pending o INNER JOIN products p on o.product_id=p.product_id)
    INNER JOIN customer c on c.`user id`=o.`user id`) INNER JOIN orders x on x.invoice_number=o.invoice_number) 
    INNER JOIN payments s on s.invoice_number=o.invoice_number)";
    $result=mysqli_query($con,$get_cus);
    while ($row=mysqli_fetch_assoc($result)){
        $order_id=$row['order_id'];
        $customer_id=$row['user id'];
        $customer_name=$row['name'];
        $customer_number=$row['phone'];
        $customer_address=$row['address'];
        $product_id=$row['product_id'];
        $product_name=$row['product_title'];
        $order_qty=$row['quantity'];
        $order_status=$row['order_status'];
        $order_date=$row['order_date'];
        $payment_mode=$row['payment_mode'];

        echo"
        <tr class='text-center'>
            <td>$order_id</td>
            <td>$customer_id</td>
            <td>$customer_name</td>
            <td>$customer_number</td>
            <td>$customer_address</td>
            <td>$product_id</td>  
            <td>$product_name</td>  
            <td>$order_qty</td> 
            <td>$order_status</td>  
            <td>$order_date</td>  
            <td>$payment_mode</td>       
            
            "; ?>
            <td><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
    }
?>

    </tbody>

</thead>

</table>
