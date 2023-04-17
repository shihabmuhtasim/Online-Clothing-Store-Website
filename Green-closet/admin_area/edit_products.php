<?php
if (isset($_GET['edit_products'])){
    $edit_id= $_GET['edit_products'];
    $data= "SELECT * FROM products where product_id=$edit_id";
    $result=mysqli_query($con,$data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_category=$row['category_id'];
    $product_apparel=$row['apparel_id'];
    $product_price=$row['product_price'];
    $product_quantity=$row['product_quantity'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $product_image=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];


    $cat_select="SELECT * FROM categories where category_id=$product_category";
    $res_cat=mysqli_query($con,$cat_select);
    $row_cat=mysqli_fetch_assoc($res_cat);
    $cat_name=$row_cat['category_title'];
   
    $app_select="SELECT * FROM apparels where apparel_id=$product_apparel";
    $res_app=mysqli_query($con,$app_select);
    $row_app=mysqli_fetch_assoc($res_app);
    $app_name=$row_app['apparel_title'];
    



}
?>




<body class="bg-light"> 
    <div class="container ">
        <h1 class="text-center">Update Products</h1> 
        <!--multipart - for adding images-->
        <form action="" method="post" enctype="multipart/form-data">  

        <!-- Product Name-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_title" class="form-label fw-bold">Product Name</label>
            <input type="text" class="form-control" id="product_title" name="product_title" aria-describedby="Product_name_help" placeholder="Enter product name" 
            required="required" autocomplete="on" value="<?php echo $product_title ?>">
        </div>
        
        <!-- Category select-->
        <div class="form-outline mb-2 w-30 m-auto">
        <label for="product_category" class="form-label fw-bold">Product Category</label>
            <select name="product_category" class="form-select" aria-label="Default select example">
                <option value="<?php echo $product_category ?>"><?php echo $cat_name ?></option>
                <?php
                    $sql="SELECT * FROM categories";
                    $res= mysqli_query($con,$sql);
                 //Q
                    while ($row = mysqli_fetch_assoc($res)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>"; 
                    
                
                    }
                 ?>
            </select>
        </div>
        <!-- Appreal select-->
        <div class="form-outline mb-2 w-30 m-auto">
        <label for="product_apparel" class="form-label fw-bold">Product Apparel</label>
            <select name="product_apparel" class="form-select" aria-label="Default select example">
            <option value="<?php echo $product_apparel ?>"><?php echo $app_name ?></option>
                <?php
                    $sql="SELECT * FROM apparels ";
                    $res= mysqli_query($con,$sql);
                 //Q
                    while ($row = mysqli_fetch_assoc($res)){
                        $apparel_title=$row['apparel_title'];
                        $apparel_id=$row['apparel_id'];
                        echo "<option value='$apparel_id'>$apparel_title</option>";
                    }
                 ?>
            </select>
        </div>
        
        <!-- product_price-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_price" class="form-label fw-bold">Product Price</label>
            <input type="text" class="form-control" id="product_keywords" name="product_price" 
            aria-describedby="product_price_help" placeholder="Enter product Price" 
            autocomplete="on" required="required" value="<?php echo $product_price ?>">
        </div>
        <!-- product_quantity-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_quantity" class="form-label fw-bold">Product Quantity</label>
            <input type="text" class="form-control" id="product_quantity" 
            name="product_quantity"  placeholder="Enter product Quantity" autocomplete="on" 
            required="required" value="<?php echo $product_quantity ?>">
        </div>
        <!-- Image-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_image" class="form-label fw-bold">Product Image</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_image" name="product_image" required="required">
                <img src="./product_images/<?php echo $product_image ?>" width='80' height='80' alt="">
            </div>
            
        <!-- Image2-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_image" class="form-label fw-bold">Product Image 2</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_image2" name="product_image2" >
                <img src="./product_images/<?php echo $product_image2 ?>" width='80' height='80' alt="">
            </div>
        </div>
        <!-- Image3-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_image3" class="form-label fw-bold">Product Image 3</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_image3" name="product_image3" >
                <img src="./product_images/<?php echo $product_image3 ?>" width='80' height='80' alt="">
            </div>
        </div>
        <!-- Product Description-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_description" class="form-label fw-bold">Product Description</label>
            <input type="text" class="form-control" id="product_description" name="product_description" aria-describedby="product_description_help" placeholder="Enter product description" 
            autocomplete="off" required="required" value="<?php echo $product_description ?>">
        </div>
        <!-- product_keywords-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="product_keywords" class="form-label fw-bold">Product Keywords</label>
            <input type="text" class="form-control" id="product_keywords" name="product_keywords" 
            aria-describedby="product_keywords_help" placeholder="Enter product Keywords" 
            autocomplete="on" required="required" value="<?php echo $product_keywords ?>">
        </div>
        <!-- Submit-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control" id="product_insert" name="edit_product" class="btn btn-info" value="Update product" >
        </div>
            
        </div>
        </form>
    </div>



<?php 
    if (isset($_POST['edit_product'])){
        $product_title=$_POST['product_title'];
        $product_category=$_POST['product_category'];
        $product_apparel=$_POST['product_apparel'];
        $product_price=$_POST['product_price'];
        $product_quantity=$_POST['product_quantity'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        //images
        $product_image=$_FILES['product_image']['name'];
        $product_temp_image=$_FILES['product_image']['tmp_name'];
    
        $product_image2=$_FILES['product_image2']['name'];
        $product_temp_image2=$_FILES['product_image2']['tmp_name'];
    
        $product_image3=$_FILES['product_image3']['name'];
        $product_temp_image3=$_FILES['product_image3']['tmp_name'];
        echo"$product_title,$product_category,$product_apparel,$product_price,$product_quantity,$product_image";
        //check
        if ($product_title=='' or $product_category =='' or $product_apparel=='' 
        or $product_price=='' or $product_quantity=='' or $product_description=='' or $product_keywords=='' or 
        $product_image=='' or $product_temp_image==''){
            echo"<script> alert('Fill in all fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($product_temp_image,"./product_images/$product_image");
            move_uploaded_file($product_temp_image2,"./product_images/$product_image2");
            move_uploaded_file($product_temp_image3,"./product_images/$product_image3");
            //product insert
            $insert="UPDATE products SET product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords', 
            category_id='$product_category', apparel_id='$product_apparel', product_image1='$product_image',product_image2='$product_image2',product_image3='$product_image3', 
            product_price='$product_price', product_quantity='$product_quantity', `date`=NOW() where product_id=$edit_id";
            $result=mysqli_query($con,$insert);

            if (!$result) {
                die("Update failed. " . mysqli_error($con));
            } 
            else {
                echo"<script>alert('Product Updated')</script>";
                exit;
            }
        }
    
        
    
    
    }
    ?>