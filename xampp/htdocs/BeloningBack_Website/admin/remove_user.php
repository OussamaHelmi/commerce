<?php
include('../Db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {
    
    $userId = $conn->real_escape_string($_POST['userId']);

    $sql = "DELETE FROM login_users WHERE id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        
        echo "User removed successfully!";
    } else {
       
        echo "Error: " . $conn->error;
    }
} else {
  
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
