<?php

if($_SERVER['REQUEST_METHOD'] != "DELETE"){
    die('Invalid request method');
}

require_once './db.php';

$query = "DELETE FROM cars WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param('i', $_GET["id"]);

$stmt->execute();

header('Content-Type: application/json');

echo json_encode("Car Deleted");

?>