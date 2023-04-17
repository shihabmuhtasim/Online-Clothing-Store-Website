<?php
if (isset($_GET['delete_order'])){
    $delete_id= $_GET['delete_order'];
    $data= "DELETE  FROM orders_pending where `order_id`= $delete_id";
    $result=mysqli_query($con,$data);
    if (!$result) {
        die("Delete failed. " . mysqli_error($con));
    } 
    else {
        echo"<script>alert('order Deleted')</script>";
        //echo"<script>window.open('./view_order.php','_self')</script>"; Won't work becasue it's not connected
        exit;
    }
}
?>