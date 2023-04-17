<?php
if (isset($_GET['delete_categories'])){
    $delete_id= $_GET['delete_categories'];
    $data= "DELETE  FROM categories where category_id=$delete_id";
    $result=mysqli_query($con,$data);
    if (!$result) {
        die("Delete failed. " . mysqli_error($con));
    } 
    else {
        echo"<script>alert('category Deleted')</script>";
        //echo"<script>window.open('./view_categories.php','_self')</script>"; Won't work becasue it's not connected
        exit;
    }
}
?>