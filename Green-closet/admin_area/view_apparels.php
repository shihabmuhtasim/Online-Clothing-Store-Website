<h1 class="text-center text-success">Green Closet Apparels</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>apparel ID</th>
        <th>apparel Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    
    <?php 
    $get_apparels="select * from apparels";
    $result=mysqli_query($con,$get_apparels);
    while ($row=mysqli_fetch_assoc($result)){
        $apparel_id=$row['apparel_id'];
        $apparel_title=$row['apparel_title'];

        echo"
        <tr class='text-center'>
            <td>$apparel_id</td>
            <td>$apparel_title</td>";?>


            <td><a href='index.php?edit_apparels=<?php echo $apparel_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_apparels=<?php echo $apparel_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
<?php
    }?>


    </tbody>

</thead>

</table>
