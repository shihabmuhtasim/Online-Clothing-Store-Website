<h1 class="text-center text-success">Green Closet Inventory</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Product Sold</th>
        <th>Product Stock Quantity</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <tbody style="background-color: #eaf4f4; color: #333;">
    <?php 
    $get_products="select * from products";
    $result=mysqli_query($con,$get_products);
    while ($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image=$row['product_image1'];
        $product_price=$row['product_price'];
        $product_quantity=$row['product_quantity'];

        echo"
        <tr class='text-center'>
            <td>$product_id</td>
            <td>$product_title</td>
            <td> <img src='./product_images/$product_image' width='150' height='150'/></td>
            <td>$product_price</td>"; ?>

            <td><?php 
            $get_count= "select SUM(quantity) as total_sold from orders_pending where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $row_count=mysqli_fetch_assoc($result_count);
            $total_sold = $row_count['total_sold'];
            if ($total_sold>0){
                echo $total_sold;
            }
            else{
                echo 0;
             }
            ?>

            <td><?php echo $product_quantity-$total_sold ?></td>
            </td>

            <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
    }
?>

    </tbody>

</thead>

</table>
