<h1 class="text-center text-success">Combinitions in use</h1>
<table class="table table-bordered mt-5">
<thead class="bg-secondary text-light text-center">
    <tr>
        <th>Category ID</th>
        <th>Category Name</th>

        <th>apparel ID</th>
        <th>apparel Name</th>
    </tr>

    <tbody style="background-color: #eaf4f4; color: #333;">
    
    <?php 
    $get_categories="select DISTINCT c.category_id, c.category_title, a.apparel_id, a.apparel_title from (categories c inner join products p on c.category_id=p.category_id ) inner join 
    apparels a on a.apparel_id=p.apparel_id";
    $result=mysqli_query($con,$get_categories);
    while ($row=mysqli_fetch_assoc($result)){
        $category_id=$row['category_id'];
        $category_title=$row['category_title'];
        $apparel_id=$row['apparel_id'];
        $apparel_title=$row['apparel_title'];

        echo"
        <tr class='text-center'>
            <td>$category_id</td>
            <td>$category_title</td>

            <td>$apparel_id</td>
            <td>$apparel_title</td>  
        </tr>";

    }?>


    </tbody>

</thead>

</table>
