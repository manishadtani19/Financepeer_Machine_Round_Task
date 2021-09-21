<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "financepeer";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$base_url = "http://localhost/financepeer_Machine_Round/";

?>