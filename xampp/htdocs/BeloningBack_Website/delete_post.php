<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit; 
}

include('Db_connection.php'); 


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $postID = $_GET['id'];

    $sql = "DELETE FROM lost_found_items WHERE id = ? AND userID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
       
        mysqli_stmt_bind_param($stmt, "ii", $postID, $_SESSION['user']['id']);
        mysqli_stmt_execute($stmt);

 
        if (mysqli_stmt_affected_rows($stmt) > 0) {
       
            header("Location: userpost.php");
            exit;
        } else {
            echo "Error: Post not found or you don't have permission to delete it.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Failed to prepare delete statement: " . mysqli_error($conn);
    }
} else {
    echo "Error: Invalid post ID";
}

mysqli_close($conn);
?>
