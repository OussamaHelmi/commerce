<?php
include('../Db_connection.php');


$sql = "SELECT COUNT(*) as postCount FROM lost_found_items";
$result = $conn->query($sql);


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $postCount = $row['postCount'];
} else {
    $postCount = 0;
}

// Close the database connection
$conn->close();

echo $postCount;
?>
