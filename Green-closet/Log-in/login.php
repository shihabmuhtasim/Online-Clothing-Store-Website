<?php
//initialize variables
$alert=false; //log in check
$error=false;// log in error check

//if we get the Log in info posted!
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    //connect to server
    include ("partials/dbconnect.php");
    //getting the posted variables
    $email= $_POST["email"];
    $password= $_POST["password"];

    $sql="select * from customer where (email='$email')";
    $result=mysqli_query($con,$sql);
    //if atleast one match found (row count)
    $num_row= mysqli_num_rows($result);
    if ($num_row==1){
        /* To access the values in the result set, we can use the mysqli_fetch_assoc() 
        function to fetch each row as an associative array.*/
        $row = mysqli_fetch_assoc($result);
        //vallues fetch from database match of the query
        $name= $row['name'];
        $hashed=$row['password'];
        $user_id=$row['user id']; //hashed password stored
        // posted pass checked with stored one
        if (password_verify($password,$hashed)){
            $alert= true;
            // now that pass matched, we'll start a session
            session_start();
            //$_SESSION is global variable to send to other places
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;
            $_SESSION['name']=$name;
            $_SESSION['user_id']=$user_id;
            header("location: ../index2.php");
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
    <form action="/Green-closet/Log-in/login.php" method="post">
        <!-- Design of Box-->
        <div class="row">
            <!--Email address Box-->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
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
        <div class="form-outline p-3">
                <p>Don't have an account! <a href="signup.php"> Register</a> Now </p>
        </div>
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>


