<?php
$serverAddress = "localhost";
$username = "root";
$password = "";
$databaseName = "lionsdaleapp";

try {
    $connection = mysqli_connect($serverAddress,$username,$password,$databaseName);
    
} catch (\Throwable $th) {
    $connection ="";
    echo "<script>alert('Something went wrong... ')</script>";
    
}