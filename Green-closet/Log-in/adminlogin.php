<?php
//initialize variables
$alert=false; //log in check
$error=false;// log in error check

//if we get the Log in info posted!
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    //connect to server
    include ("partials/dbconnect.php");
    //getting the posted variables
    $username= $_POST["username"];
    $password= $_POST["password"];

    $sql="SELECT * FROM admin_info WHERE username= '$username' ";
    $res=mysqli_query($con,$sql);
    
       
    //if atleast one match found (row count)
    $num_row= mysqli_num_rows($res); 
    if ($num_row==1){
        /* To access the values in the result set, we can use the mysqli_fetch_assoc() function 
        to fetch each row as an associative array.*/
        //vallues fetch from database match of the query
        $row = mysqli_fetch_assoc($res);
        $name= $row['name'];
        $hashed=$row['password']; //hashed password stored
        // posted pass check with stored one
        //if ($password ==$hashed){
        if (password_verify ($password,$hashed)){
            echo 'Password is valid!';
            $alert= true;
            // now that pass matched, we'll start a session
            session_start();
            //$_SESSION is global variable to send to other places
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            $_SESSION['name']=$name;
            header("location: ../admin_area/index.php");
            exit();
            
        }
        else{
            //pass did not match
            $error=true;
        }
    }
    else{
        //email did not match
        $error=true;
    }    
}    
?> 
<!-- DESIGN OF LOG IN -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <!-- connect navigration bar-->
    <?php require "partials/navbar.php"?>
    <?php
    if ($alert){
        //Log in success message
        echo'
            <div class="alert alert-success" role="alert">
                Congratulations! You have successfully logged in. 
            </div>';
    }
    ?>
    <?php
    if ($error){
        // Log in failed message
        echo'
            <div class="alert alert-danger" role="alert">
                Invalid email or password!.
            </div>';
    }
    ?>
    <!-- LOG IN BOXES -->
    <div class="container">
    <!-- Heading -->
    <h1 class="text-center fw-bold" style="color: green; font-family: 'Montserrat', sans-serif;">LOG IN TO GREEN CLOSET</h1>
    <form action="/Green-closet/Log-in/adminlogin.php" method="post">
        <!-- Design of Box-->
        <div class="row">
            <!--"username" address Box-->
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
            </div>
            <!--Password Box-->
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <!--Log in Button-->
            <div class="text-center">
            <button type="submit" class="btn btn-primary bg-success fw-bold">Log in</button>
        </div>
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>


