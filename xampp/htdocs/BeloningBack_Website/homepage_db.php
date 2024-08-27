<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dbaseconnection";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, city, state, date, details, contactPurpose, image FROM lost_found_items ORDER BY date DESC LIMIT 4";


$result = $conn->query($sql);

if (!$result) {
    die("Error fetching data: " . $conn->error);
}


$sql_count = "SELECT COUNT(*) as count FROM lost_found_items";


$count_result = $conn->query($sql_count);


if (!$count_result) {
    die("Error fetching count: " . $conn->error);
}

$count_row = $count_result->fetch_assoc();
$total_items = $count_row['count'];


$count_result->close();


$conn->close();
?>