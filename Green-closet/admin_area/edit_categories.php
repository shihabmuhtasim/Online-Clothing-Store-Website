<?php
if (isset($_GET['edit_categories'])){
    $edit_id= $_GET['edit_categories'];
    $data= "SELECT * FROM categories where category_id=$edit_id";
    $result=mysqli_query($con,$data);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
?>




<body class="bg-light"> 
    <div class="container ">
        <h1 class="text-center">Update categories</h1> 
        <!--multipart - for adding images-->
        <form action="" method="post">  

        <!-- category Name-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="category_title" class="form-label fw-bold">category Name</label>
            <input type="text" class="form-control" id="category_title" name="category_title" aria-describedby="category_name_help" placeholder="Enter category name" 
            required="required" autocomplete="on" value="<?php echo $category_title ?>">
        </div>
        
        <!-- Submit-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control" id="category_insert" name="edit_category" class="btn btn-info" value="Update category" >
        </div>
            
        </div>
        </form>
    </div>



<?php 
    if (isset($_POST['edit_category'])){
        $category_title=$_POST['category_title'];
        //check
        if ($category_title==''){
            echo"<script> alert('Fill in all fields')</script>";
            exit();
        }
        else{
            $select_query="Select * from `categories` where category_title='$category_title'";
            $result_select=mysqli_query($con,$select_query);
            $number=mysqli_num_rows($result_select);
            if($number>0){
                echo "<script>alert('This category is present inside the database')</script>";
            }
            else{
            //category insert
            $insert="UPDATE categories SET category_title='$category_title' where category_id=$edit_id";
            $result=mysqli_query($con,$insert);

            if (!$result) {
                die("Update failed. " . mysqli_error($con));
            } 
            else {
                echo"<script>alert('category Updated')</script>";
                exit;
            }
        }
    }
    
        
    
    
    }
    ?>