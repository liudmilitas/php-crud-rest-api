<?php 
// inserts one car into the car-db

if($_SERVER['REQUEST_METHOD'] != "POST"){
    die('Invalid request method');
}

require_once './db.php';

$input_json = file_get_contents("php://input");

$input = json_decode($input_json, TRUE);

$query = "INSERT INTO `cars` (`make`, `model`) VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param('ss', $input["make"], $input["model"]);

$success = $stmt->execute();

header('Content-Type: application/json');

if($success){
    http_response_code(201);
    echo json_encode("Car created");
} else {
    http_response_code(500);
    echo json_encode($stmt->errno);
}

?>