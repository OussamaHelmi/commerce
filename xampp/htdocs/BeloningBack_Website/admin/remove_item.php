<?php
include('../Db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemId'])) {
    
    $itemId = $conn->real_escape_string($_POST['itemId']);

    $sql = "DELETE FROM lost_found_items WHERE id = '$itemId'";

    if ($conn->query($sql) === TRUE) {

        echo "Item removed successfully!";
    } else {
     
        echo "Error: " . $conn->error;
    }
} else {
  
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
