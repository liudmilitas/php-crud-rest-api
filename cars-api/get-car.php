<?php 

// Gets one car from the database
// based on the id from URL-query parameters

if($_SERVER['REQUEST_METHOD'] != "GET"){
    die('Invalid request method');
}

require_once './db.php';

$query = "SELECT * FROM cars WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

$stmt->bind_param('i', $_GET["id"]);

$stmt->execute();

$result = $stmt->get_result();

$car = mysqli_fetch_assoc($result);

header('Content-Type: application/json');

if($car){
    echo json_encode($car);
} else {
    http_response_code(404);
    echo json_encode("Car Not Found");
}

?>