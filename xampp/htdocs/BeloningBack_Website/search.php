<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Search</title>
</head>
<body>
    <?php include('includes/header.php'); ?>
   
    <?php
    // if (!isset($_SESSION['user'])) {
    //     header("Location: login.php");
    //     exit;
    // }

    include('Db_connection.php');

    // $userID = $_SESSION['user']['id'];


    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {

        $search_query = '%' . htmlspecialchars($_GET['query']) . '%';

        $sql = "SELECT id, itemType, contactPurpose, date, location, city, state, details, image 
                FROM lost_found_items 
                WHERE (itemType LIKE ? OR location LIKE ? OR city LIKE ? OR state LIKE ? OR details LIKE ?)

                -- WHERE (userID = ?) AND (itemType LIKE ? OR location LIKE ? OR city LIKE ? OR state LIKE ? OR details LIKE ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $search_query, $search_query, $search_query, $search_query, $search_query);
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
                    echo "<td><a href='itempage.php?id=" . $row['id'] . "'><img id='showimage' src='" . $row["image"] . "' alt='Image not found'></a></td>";
                    echo "<td><a href='itempage.php?id=" . $row['id'] . "'>" . $row["itemType"] . "</a></td>";
                    echo "<td><a href='itempage.php?id=" . $row['id'] . "'>" . $row["city"] . "</a></td>";
                    echo "<td><a href='itempage.php?id=" . $row['id'] . "'>" . $row["details"] . "</a></td>";
                    echo "<td class='enlarge-date'><a href='itempage.php?id=" . $row['id'] . "'>". $row["date"] . "</a></td>";
                    echo "<td><a href='itempage.php?id=" . $row['id'] . "'>" . $row["contactPurpose"] . " item</a></td>";
                    echo "</tr>";
                }
            
                echo "</tbody></table>";
            } else {
                echo "<p>No results found.</p>";
            }
            
            mysqli_stmt_close($stmt);
        }
    } else {
        echo "<p>No search query provided.</p>";
    }

    $conn->close();
    ?>
    
<?php
include('includes/footer.php');
?>
</body>
</html>
