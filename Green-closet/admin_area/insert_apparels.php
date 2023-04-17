<?php 
include('../includes/connect.php');
if(isset($_POST['insert_apparels'])){
    $apparel_title=$_POST['apparel_title'];
    // select data from database
    $select_query="Select * from `apparels` where apparel_title='$apparel_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This apparel is present inside the database')</script>";
    }else{


    $insert_query="insert into `apparels` (apparel_title) values ('$apparel_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('apparel has been inserted successfully')</script>";
    }
}}
?>

<h2 class="text-center">Insert Apparels</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="apparel_title" placeholder="Insert apparels" aria-label="apparels" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_apparels" value="Insert apparels" aria-label="Insert apparels" aria-describedby="basic-addon1" class="bg-info">
    
</div>
</form>