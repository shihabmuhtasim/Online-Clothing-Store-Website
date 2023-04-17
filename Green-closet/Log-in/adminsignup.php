<?php
//initialize variables
$alert=false; //to check if sign up successful
$error=false; // sign up error
$username_exists=false; 
$ref_matches=false;

//if we get the sign up info posted!
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    //connecting to database
    include ("partials/dbconnect.php");
    //taking in the variables given in the form
    $name= $_POST["Name"];
    $username= $_POST["username"];
    $phone_number= $_POST["phone_number"];
    $ref_code= $_POST["ref_code"];
    $ref_code_gen= $_POST["ref_code_gen"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
    
    //check if reference code matched
    $ref_check= "SELECT * FROM admin_info WHERE reference_code='$ref_code'";
    $res_ref= mysqli_query($con, $ref_check);
    $num_row_ref= mysqli_num_rows($res_ref);
    if ($num_row_ref>0){ 
        $ref_matches= true;
    }
    
    //checking if username already exists
    $username_check= "SELECT * FROM admin_info WHERE username='$username'";
    //database connect and run the query
    $res= mysqli_query($con, $username_check);
    // an array storing the corresponding row info
    $num= mysqli_num_rows($res);
    if ($num==1){ 
        $username_exists= true;
    }
    //hashing the password if it matches
    if (($password==$cpassword) && ($username_exists== false) &&($ref_matches== true)){
        $hash= password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `admin_info` (`name`, `email`, `reference_code`, `phone`, `password`, `username`) 
        VALUES ('$name', '$email', '$ref_code_gen', '$phone_number', '$hash', '$username')";
        $result=mysqli_query($con,$sql);
        if ($result){
            $alert= true;
        }    
    }
    if (($password!=$cpassword)){
        $error=true; //pass not matched
    }
    
    //sign up success message 
    if ($alert){
        echo'
            <div class="alert alert-success" role="alert">
                Your account has been created!
            </div>';
    }

    //sign up failed message
    if ($error){
        echo'
            <div class="alert alert-danger" role="alert">
                The password do not match! Please follow instructions.
            </div>';
    }
    
    

    //email already exists message
    if ($username_exists){
        echo'
            <div class="alert alert-warning" role="alert">
                There is already an account with this username.
            </div>';
    }
    

    //email already exists message
    if (!$ref_matches){
        echo'
            <div class="alert alert-warning" role="alert">
                The reference code is invalid
            </div>';
    }
    
    



}
?> 
<!-- DESIGNING OF THE PAGE-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <!-- connect navbar-->
    <?php require "partials/navbar.php"?>
    
    <!-- HTML bootstrap design -->
    <div class="container">
    <!-- Heading of page -->
    <h1 class="text-center fw-bold" style="color: green; font-family: 'Montserrat', sans-serif;">SIGN UP AS ADMIN</h1>
    <form action="/Green-closet/Log-in/adminsignup.php" method="post">

        <div class="row">
            <!-- Name box-->
            <div class="col-md-6 mb-3">
                <label for="Name" class="form-label fw-bold">Name</label>
                <input type="text" maxlength="30" class="form-control" id="Name" name="Name" aria-describedby="nameHelp">
            </div>
            <!--pohone num box-->
            <div class="col-md-6 mb-3">
                <label for="phone_number" class="form-label fw-bold">Phone number</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" aria-describedby="phoneHelp">
                <div id="phoneHelp" maxlength="15" class="form-text">Enter a valid phone number</div>
            </div>
            <!--Reference box-->
            <div class="col-md-6 mb-3">
                <label for="ref_code" class="form-label fw-bold">Reference Code</label>
                <input type="text" maxlength="5" class="form-control" id="ref_code" name="ref_code" aria-describedby="ref_code_Help">
                <div id="ref_code_Help" maxlength="5" class="form-text">Enter reference code given by other admins</div>
            </div>
            <!--Reference Generate box-->
            <div class="col-md-6 mb-3">
                <label for="ref_code_gen" class="form-label fw-bold">Your reference Code</label>
                <input type="text" maxlength="5" class="form-control" id="ref_code_gen" name="ref_code_gen" aria-describedby="ref_code_Help">
                <div id="ref_code_Help" maxlength="5" class="form-text">Enter a reference code that you'd like to use for other new admin signups</div>
            </div>
            <!--Email box-->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold">Email address</label>
                <input type="email" maxlength="50" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <!--username box-->
            <div class="col-md-6 mb-3">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
            </div>
            <!--Password box-->
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" maxlength="30" class="form-control" id="password" name="password">
            </div>
            <!--Confirm pass box-->
            <div class="col-md-6 mb-3">
                <label for="cpassword" class="form-label fw-bold">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="cpassword"  maxlength="30" class="form-text">Please enter the password again.</div>
            </div>
            </div>
            <!--Sign up button button-->
            <div class="text-center">
            <button type="submit" class="btn btn-primary bg-success fw-bold">Sign Up as Admin</button>
        </div>
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>


