<h1 class="text-center text-success">Green Closet Categories</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    
    <?php 
    $get_categories="select * from categories";
    $result=mysqli_query($con,$get_categories);
    while ($row=mysqli_fetch_assoc($result)){
        $category_id=$row['category_id'];
        $category_title=$row['category_title'];

        echo"
        <tr class='text-center'>
            <td>$category_id</td>
            <td>$category_title</td>";?>


            <td><a href='index.php?edit_categories=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_categories=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
<?php
    }?>


    </tbody>

</thead>

</table>
