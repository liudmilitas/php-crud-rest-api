<?php 
    $host = "localhost";
    $username = "root";
    $password = "1234";
    $database_name = "cars-db";

    $conn = mysqli_connect($host, $username, $password, $database_name);

    if (!$conn) {
        die('Oops! Connection failed!');
    }


?>