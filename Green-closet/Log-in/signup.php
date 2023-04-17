<?php
include('../functions/extra.php');
/* $_SERVER["REQUEST_METHOD"] is an element of the $_SERVER array that retrieves the request method used to access the page, which in this case is "POST". 
In the code above, this is used in the if statement to check if the form was submitted using the POST method.
$_POST is associative array that stores data submitted via the POST method
$result makes sure that data is inserted
$error is to check if pass don't  match
*/
//initialize variables
$alert=false; //to check if sign up successful
$error=false; // sign up error
$email_exists=false; 

//if we get the sign up info posted!
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    //connecting to database
    include ("partials/dbconnect.php");
    //taking in the variables given in the form
    $name= $_POST["Name"];
    $phone_number= $_POST["phone_number"];
    $address= $_POST["address"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
    $ip=getIPAddress();
    //checking if email already exists
    $email_check= "SELECT * FROM customer  WHERE email='$email'";
    //database connect and run the query
    $res= mysqli_query($con, $email_check);
    // an array storing the corresponding row info
    $num= mysqli_num_rows($res);
    if ($num==1){ 
        $email_exists= true;
    }
    //hashing the password if it matches
    if (($password==$cpassword) && ($email_exists== false)){
        $hash= password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `customer` ( `name`, `email`, `address`, `phone`, `password`,ip) VALUES ('$name ', '$email', '$address', '$phone_number', '$hash','$ip')";
        $result=mysqli_query($con,$sql);
        if ($result){
            $alert= true;
        }    
    }
    if ($password!=$cpassword){
        $error=false; //pass not matched
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
    <?php
    //sign up success message 
    if ($alert){
        echo'
            <div class="alert alert-success" role="alert">
                Your account has been created!
            </div>';
    }
    ?>

    <?php
    //sign up failed message
    if ($error){
        echo'
            <div class="alert alert-danger" role="alert">
                The password do not match! Please follow instructions.
            </div>';
    }
    ?>
    
    <?php
    //email already exists message
    if ($email_exists){
        echo'
            <div class="alert alert-warning" role="alert">
                There is already an account with this e-mail.
            </div>';
    }
    ?>
    <!-- HTML bootstrap design -->
    <div class="container">
    <!-- Heading of page -->
    <h1 class="text-center fw-bold" style="color: green; font-family: 'Montserrat', sans-serif;">SIGN UP TO GREEN CLOSET</h1>
    <form action="/Green-closet/Log-in/signup.php" method="post">

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
            <!--Address box-->
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label fw-bold">Address</label>
                <input type="text" maxlength="50" class="form-control" id="address" name="address" aria-describedby="addressHelp">
            </div>
            <!--Email box-->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold">Email address</label>
                <input type="email" maxlength="50" class="form-control" id="email" name="email" aria-describedby="emailHelp">
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
            <!--Sign up button box-->
            <div class="text-center">
            <button type="submit" class="btn btn-primary bg-success fw-bold">Sign Up</button>
        </div>
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>


