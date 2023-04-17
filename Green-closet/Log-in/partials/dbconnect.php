<?php
$server="localhost";
$username="root";
$password="";
$database="green closet";
$con= mysqli_connect($server,$username,$password,$database);
if (!$con){
    die("error");
}
?>