<h1 class="text-center text-success">Green Closet Family</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Customer Phone Number</th>
        <th>Customer Address</th>
        <th>Delete</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    <?php 
    $get_cus="select * from customer";
    $result=mysqli_query($con,$get_cus);
    while ($row=mysqli_fetch_assoc($result)){
        $customer_id=$row['user id'];
        $customer_name=$row['name'];
        $customer_number=$row['phone'];
        $customer_address=$row['address'];

        echo"
        <tr class='text-center'>
            <td>$customer_id</td>
            <td>$customer_name</td>
            <td>$customer_number</td>
            <td>$customer_address</td>            
            
            "; ?>
            <td><a href='index.php?delete_customers=<?php echo $customer_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
    }
?>

    </tbody>

</thead>

</table>
