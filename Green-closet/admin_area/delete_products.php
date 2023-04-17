<?php
if (isset($_GET['delete_products'])){
    $delete_id= $_GET['delete_products'];
    $data= "DELETE  FROM products where product_id=$delete_id";
    $result=mysqli_query($con,$data);
    if (!$result) {
        die("Delete failed. " . mysqli_error($con));
    } 
    else {
        echo"<script>alert('Product Deleted')</script>";
        //echo"<script>window.open('./view_products.php','_self')</script>"; Won't work becasue it's not connected
        exit;
    }
}
?>