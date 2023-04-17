<?php
// storing the log in status to diffrenciate 
if (session_status() == PHP_SESSION_NONE) {
  $login_status=false;
}
else{
  if (isset($_SESSION) && isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    $login_status=true;
  }
  else{
    $login_status=false;
  }
}
//<!-- NAV BAR BUTTONS BASED ON PAGE -->
//Nav info for all users i) Green closet, Home
echo'<nav class="navbar navbar-expand-lg" style="background-color: #d1f2eb">
  <div class="container-fluid"> 
    
        ';
        
        //So if logged in, nav bar will show below info specifically i)Log out, Dropdown,Cart
        if ($login_status){
        echo'
        <a class="navbar-brand" href="/Green-closet/index2.php" style="font-weight: bold;">Green Closet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
            <!-- the home button will navigate to welcome.php-->
          <a class="nav-link active" aria-current="page" href="/Green-closet/index2.php" style="font-weight: bold;">Home</a>
        </li>

        <li class="nav-item">
              <a class="nav-link" href="/Green-closet/Log-in/logout.php" style="font-weight: bold;">Log out</a>
            </li>
          
        
        <li class="nav-item">
          <a class="nav-link" href="/Green-closet/cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="/Green-closet/Log-in/profile.php" style="font-weight: bold;">Profile</a>
        </li>
        ';

        }
        //if NOT logged in, nav bar will show below info specifically i)sign up, Log in , Admin log in, Admin register
        else{
            echo' 
            <a class="navbar-brand" href="/Green-closet/index.php" style="font-weight: bold;">Green Closet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
            <!-- the home button will navigate to welcome.php-->
          <a class="nav-link active" aria-current="page" href="/Green-closet/index.php" style="font-weight: bold;">Home</a>
        </li>
         
            
            <li class="nav-item">
                    <a class="nav-link" href="/Green-closet/Log-in/login.php" style="font-weight: bold;">Login</a>
              </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/Green-closet/Log-in/signup.php" style="font-weight: bold;">Sign up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/Green-closet/Log-in/adminlogin.php" style="font-weight: bold;">Admin Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/Green-closet/Log-in/adminsignup.php" style="font-weight: bold;">Admin Sign up</a>
                  </li>
                  <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>';
        }
      //search handel
      echo'
      <form class="d-flex ms-auto" action="search_product.php" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
      </form>
      
      
      </ul>
    </div>
  </div>
</nav>';
?>
