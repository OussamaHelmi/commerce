<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/userposts.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Mypost</title>
</head>
<body>
    <?php
     include('includes/header.php');
    ?>
   
    <?php

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include('Db_connection.php');

$userID = $_SESSION['user']['id'];

$sql = "SELECT id, itemType, contactPurpose, date, location, city, state, details, image 
        FROM lost_found_items 
        WHERE userID = ?";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
        <thead>
      
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            
        </thead>
        <tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='row-spacing table-row'>";
            echo "<td><img id='showimage' src='" . $row["image"] . "' alt='Image not found'></td>";
            echo "<td>" . $row["itemType"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["details"] . "</td>";
            echo "<td class='enlarge-date'>". $row["date"] . "</td>";
            echo "<td>" . $row["contactPurpose"] . " item</td>";
            echo "<td><button id='button' class='remove-btn' onclick='removeItem(" . $row["id"] . ")'><span  class='material-symbols-outlined'>delete</span></button></td>";
            echo "</tr>";
        }
    
        echo "</tbody></table>";
    } else {
        echo "0 results";
    }
    
    $conn->close();
}
?>

   
    <script>
function removeItem(postID) {
    
    if (confirm("Are you sure you want to delete this post?")) {

        window.location.href = "delete_post.php?id=" + postID;
    }
}
</script>
    <?php
    include('includes/footer.php');
    ?>
</body>
</html>
