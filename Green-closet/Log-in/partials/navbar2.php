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

        
      
        
        //So if logged in, nav bar will show below info specifically i)Log out, Dropdown,Cart
        if ($login_status){
        echo'
          <nav class="navbar navbar-expand-lg" style="background-color: #d1f2eb">
      <div class="container-fluid"> 
    <a class="navbar-brand" href="/Green-closet/admin_area/index.php" style="font-weight: bold;">Green Closet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
            <!-- the home button will navigate to welcome.php-->
          <a class="nav-link active" aria-current="page" href="/Green-closet/admin_area/index.php" style="font-weight: bold;">Home</a>
        </li>
        
        
        <li class="nav-item">
              <a class="nav-link" href="/Green-closet/Log-in/logout.php" style="font-weight: bold;">Log out</a>
            </li>';
        }

      echo'
      </ul>
    </div>
  </div>
</nav>';
?>
