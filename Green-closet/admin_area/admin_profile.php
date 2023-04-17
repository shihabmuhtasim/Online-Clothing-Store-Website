
<?php 
$username= $_SESSION['username'];
?>

<h1 class="text-center text-success"><?php echo $_SESSION['name'] ?>'s Profile</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>Admin ID</th>
        <th>Admin Name</th>
        <th>Admin email</th>
        <th>Admin number</th>
        <th>Reference Code</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    
    <?php 
    
    $get_categories="select * from admin_info where username='$username'";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    
    $admin_id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $ref=$row['reference_code'];

    echo"
    <tr class='text-center'>
        <td>$admin_id</td>
        <td>$name</td>
        <td>$email</td>
        <td>$phone</td>
        <td>$ref</td> ";?>
    </tr>




    </tbody>

</thead>

</table>
