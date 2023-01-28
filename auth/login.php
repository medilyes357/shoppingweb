<?php 
session_start();
require_once("../required/connexion.php");


$username = $_POST["username"];
$password = $_POST["password"];


$sql = "SELECT * FROM users WHERE username = '$username' AND password= '$password'";

$result = mysqli_query($con ,$sql);

if(mysqli_num_rows($result) != 1)
 header("location: ../index.php");


 $user = mysqli_fetch_assoc($result);

 $_SESSION["username"] = $user["username"];
 $_SESSION["id"] = $user["id"];
 $_SESSION["cart"] = array();
 $_SESSION["cart_total"] = 0;

 header("location: ../products/index.php");