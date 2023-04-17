<?php
include('./includes/connect.php');

function getproducts(){
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['apparel'])){

    $select_query = "SELECT * FROM `products` order by rand()";  //product_title //LIMIT 0,9
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $apparel_id=$row['apparel_id'];
    $category_id=$row['category_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card flex-fill h-100'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    <a href='index2.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to cart</a>

                </div>
    </div>
    </div>";
}
}
}
}


function get_unique_categories(){
    global $con;

    // condition to check isset or not
    if (isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query = "SELECT * FROM `products` where category_id=$category_id" ;  //product_title //LIMIT 0,9
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if ($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No Stock For This category</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $apparel_id=$row['apparel_id'];
    $category_id=$row['category_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card flex-fill h-100'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
    </div>
    </div>";
}
}
}

function get_unique_apparels(){
    global $con;

    // condition to check isset or not
    if (isset($_GET['apparel'])){
        $apparel_id=$_GET['apparel'];
    $select_query = "SELECT * FROM `products` where apparel_id=$apparel_id";  //product_title //LIMIT 0,9
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if ($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No Stock For This apparel</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $apparel_id=$row['apparel_id'];
    $category_id=$row['category_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card flex-fill h-100'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
    </div>
    </div>";
}
}
}


// display category
function getcategory(){
    global $con;
    $select_categories="Select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);
//$row_data=mysqli_fetch_assoc($result_categories);
//echo $row_data['category_title'];
while($row_data=mysqli_fetch_assoc($result_categories)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo " <li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
</li>";
}
}




// display apparel
function getapparel(){
    global $con;
$select_apparels="Select * from `apparels`";
$result_apparels=mysqli_query($con,$select_apparels);
//$row_data=mysqli_fetch_assoc($result_apparels);
//echo $row_data['apparel_title'];
while($row_data=mysqli_fetch_assoc($result_apparels)){
    $apparel_title=$row_data['apparel_title'];
    $apparel_id=$row_data['apparel_id'];
    echo " <li class='nav-item'>
    <a href='index.php?apparel=$apparel_id' class='nav-link text-light'>$apparel_title</a>
</li>";
}
}

function search_product(){
    global $con;
    if (isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    $search_query = "SELECT * FROM `products` where product_keywords like '%$search_data_value%'";  //product_title //LIMIT 0,9
$result_query=mysqli_query($con,$search_query);
$num_of_rows=mysqli_num_rows($result_query);
if ($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No results match. No products found on this category!";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $apparel_id=$row['apparel_id'];
    $category_id=$row['category_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card flex-fill h-100'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
    </div>
    </div>";
}
}
}


function view_details(){
    global $con;

    if(isset($_GET['product_id'])){
    // condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['apparel'])){

        $product_id=$_GET['product_id'];
    $select_query = "SELECT * FROM `products` where product_id=$product_id";  //product_title //LIMIT 0,9
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $apparel_id=$row['apparel_id'];
    $category_id=$row['category_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to cart</a>
                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                </div>
    </div>
    </div>
    <div class='col-md-8'>
                <!-- related images -->
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center mb-5'>More Pictures related to this product</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>

                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                        
                    </div>
                </div>

            </div>";
}
}
}
}
}





//get ip address
function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  


function cart(){

if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if ($num_of_rows>0){
    echo "<script>alert('This item is already present inside cart')</script>";
    echo "<script>window.open('index2.php','_self')</script>";

}else{
    $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',0)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('This item is added to cart')</script>";
    echo "<script>window.open('index2.php','_self')</script>";
}
}
}

function cart_item(){
if(isset($_GET['add_to_cart'])){
    
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        
    }
    echo $count_cart_items;
    }


?>