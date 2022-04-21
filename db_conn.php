<?php 

$server = "localhost";
$user = "dbadmin";
$pass = "Db@dm!n@123";
$database = "login_register";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
