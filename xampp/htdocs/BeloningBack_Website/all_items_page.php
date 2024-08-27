
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindItems</title>
   <link rel="stylesheet" href="css/all_items_page.css">
   <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.css">
</head>
<body>
    <?php 
   
    include('includes/header.php'); ?>

    <div class="container">
        <div class="row justify-content-center"> 
            <?php
            include('Db_connection.php');

            $sql = "SELECT id, city, state, date, details, image, contactPurpose FROM lost_found_items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-3">';
                    echo '<a href="itempage.php?id=' . $row['id'] . '">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<p id="contactpurpose">' . ucfirst($row['contactPurpose']) . ' Item</p>';
                    echo '<img style="width: 100%; height: 200px;" src="' . $row['image'] . '" class="img-fluid">';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<ul class="footer_items">';
                    echo '<li><p><b>' . $row['city'] . '</b></p></li>';
                    echo '<li><p><b>' . $row['state'] . '</b></p></li>';
                    echo '<li><p><b>' . $row['date'] . '</b></p></li>';
                    echo '</ul>';
                    echo '<p id="details">' . $row['details'] . '</p>'; 
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No records found</p>';
            }

            $result->close();
            $conn->close();
            ?>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
