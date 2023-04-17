<?php
if (isset($_GET['delete_customers'])){
    $delete_id= $_GET['delete_customers'];
    $data= "DELETE  FROM customer where `user id`= $delete_id";
    $result=mysqli_query($con,$data);
    if (!$result) {
        die("Delete failed. " . mysqli_error($con));
    } 
    else {
        echo"<script>alert('customer Deleted')</script>";
        //echo"<script>window.open('./view_customers.php','_self')</script>"; Won't work becasue it's not connected
        exit;
    }
}
?>