<?php

//gets all cars from cars-db

if($_SERVER['REQUEST_METHOD'] != "GET"){
    die('Invalid request method');
}

require_once "./db.php";

$query = "SELECT * FROM cars";

$result = mysqli_query($conn, $query) or die('Select Query Failed');

$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

header("Content-Type: application/json");

echo json_encode($cars);

?>