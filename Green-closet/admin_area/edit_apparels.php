<?php
if (isset($_GET['edit_apparels'])){
    $edit_id= $_GET['edit_apparels'];
    $data= "SELECT * FROM apparels where apparel_id=$edit_id";
    $result=mysqli_query($con,$data);
    $row=mysqli_fetch_assoc($result);
    $apparel_title=$row['apparel_title'];    
    
}
?>








<body class="bg-light"> 
    <div class="container ">
        <h1 class="text-center">Update apparels</h1> 
        <!--multipart - for adding images-->
        <form action="" method="post">  

        <!-- apparel Name-->
        <div class="form-outline mb-2 w-30 m-auto">
            <label for="apparel_title" class="form-label fw-bold">apparel Name</label>
            <input type="text" class="form-control" id="apparel_title" name="apparel_title" aria-describedby="apparel_name_help" placeholder="Enter apparel name" 
            required="required" autocomplete="on" value="<?php echo $apparel_title ?>">
        </div>
        
        <!-- Submit-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control" id="apparel_insert" name="edit_apparel" class="btn btn-info" value="Update apparel" >
        </div>
            
        </div>
        </form>
    </div>



<?php 
    if (isset($_POST['edit_apparel'])){
        $apparel_title=$_POST['apparel_title'];
        //check
        if ($apparel_title==''){
            echo"<script> alert('Fill in all fields')</script>";
            exit();
        }
        else{
            $select_query="Select * from `apparels` where apparel_title='$apparel_title'";
            $result_select=mysqli_query($con,$select_query);
            $number=mysqli_num_rows($result_select);
            if($number>0){
                echo "<script>alert('This apparel is present inside the database')</script>";
            }
            else{
            //apparel insert
            $insert="UPDATE apparels SET apparel_title='$apparel_title' where apparel_id=$edit_id";
            $result=mysqli_query($con,$insert);

            if (!$result) {
                die("Update failed. " . mysqli_error($con));
            } 
            else {
                echo"<script>alert('apparel Updated')</script>";
                exit;
            }
        }
    }
    
        
    
    
    }
    ?>


