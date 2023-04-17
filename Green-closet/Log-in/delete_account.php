    <h3 class="text-dark mb-4">Delete Account</h3>
    <form action="" method ="post" class = "mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class = "form-control w-50 m-auto" name = "delete" value = "Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class = "form-control w-50 m-auto" name = "dont delete" value = "Don't Delete Account">
        </div>
    </form>

<?php
$name_session = $_SESSION['name'];
if(isset($_POST['delete'])){
    $delete_query = "DELETE from `customer` where `name` = '$name_session'";
    $result = mysqli_query($con, $delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}
?>