<?php
if(isset($_GET['edit_account'])){
    $user_session_email = $_SESSION['email'];
    $select_query = "Select * from `customer` where email = '$user_session_email'";
    $result_query = mysqli_query($con,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user id'];
    $name = $row_fetch['name'];
    $email = $row_fetch['email'];
    $address = $row_fetch['address'];
    $phone = $row_fetch['phone'];
}
    if(isset($_POST['update'])){
        $update_id = $user_id;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
    // update query
    $update_data = "UPDATE `customer` set `name` = '$name', `email` = '$email', `address` = '$address', `phone` = '$phone' WHERE  `user id` = $update_id";
    $result_query_update = mysqli_query($con,$update_data);
    if($result_query_update){
        echo "<script>alert('Data Updated Successful!!')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h3 class="text-center mb-4">Edit Account</h3>
    <form action="" method = "post" class = "text-center">
        <div class="form-outline mb-4">
            <input type="text" class = "form-control w-50 m-auto" value = "<?php echo $name ?>" name = "name">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class = "form-control w-50 m-auto" value = "<?php echo $email ?>" name = "email">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class = "form-control w-50 m-auto" value = "<?php echo $address ?>" name = "address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class = "form-control w-50 m-auto" value = "<?php echo $phone ?>" name = "phone">
        </div>
        <input type="submit" value = "Update" style="background-color: #d1f2eb;" class = "py-2 px-3 border-0" name = "update">
    </form>
</body>
</html>