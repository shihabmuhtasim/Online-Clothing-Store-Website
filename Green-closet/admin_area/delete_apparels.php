<?php
if (isset($_GET['delete_apparels'])){
    $delete_id= $_GET['delete_apparels'];
    $data= "DELETE  FROM apparels where apparel_id=$delete_id";
    $result=mysqli_query($con,$data);
    if (!$result) {
        die("Delete failed. " . mysqli_error($con));
    } 
    else {
        echo"<script>alert('apparel Deleted')</script>";
        //echo"<script>window.open('./view_apparels.php','_self')</script>"; Won't work becasue it's not connected
        exit;
    }
}
?>