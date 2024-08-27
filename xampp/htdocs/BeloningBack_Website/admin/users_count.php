<?php
include('../Db_connection.php');


$sql = "SELECT COUNT(*) as userCount FROM login_users";
$result = $conn->query($sql);


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userCount = $row['userCount'];
} else {
    $userCount = 0;
}

// Close the database connection
$conn->close();

echo $userCount;
?>
