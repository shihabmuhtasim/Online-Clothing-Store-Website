<?php
//connect to the session first
session_start();
//free all the variables of the session
session_unset();
//log out
session_destroy();
header("location: login.php");
exit;
?>
