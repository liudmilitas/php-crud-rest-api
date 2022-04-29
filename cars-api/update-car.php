<?php 
// updates car in the car-db

if($_SERVER['REQUEST_METHOD'] != "PATCH"){
    die('Invalid request method');
}

require_once './db.php';

$input_json = file_get_contents("php://input");

$input = json_decode($input_json, TRUE);

$query = "UPDATE `cars` SET `make` = ?, `model` = ? WHERE `id` = ?";

$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param('ssi', $input["make"], $input["model"], $_GET["id"]);

$success = $stmt->execute();

header('Content-Type: application/json');

if($success){
    http_response_code(201);
    echo json_encode("Car updated");
} else {
    http_response_code(500);
    echo json_encode($stmt->errno);
}

?>