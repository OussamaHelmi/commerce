<?php


include('includes/header.php');


include('homepage_db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepagee.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.css">
    <title>Homepage</title>
</head>
<body>

<img style="width: 800px; margin-left:500px;" src="/img/bg1.png">
<h1 id="brief">WAY TO FIND LOST OBJECTS</h1>
<h6 id="words">Relife , Reunited , Satisfaction </h6>
<br>
<div class="box_shadow">
    <h3 id="return">Recently Returns</h3>
    <div class="show">

        <?php

        $sql = "SELECT id, city, state, date, details, image, contactPurpose FROM lost_found_items";


       

        if (mysqli_num_rows($result) > 0) {
 
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="itempage.php?id=' . $row['id'] . '">';
                echo '<div id="ca" class="card">';
                echo '<div class="card-body">';
                echo '<p id="contactpurpose">' . ucfirst($row['contactPurpose']) . ' Item</p>'; // Display contact purpose (Lost/Found)
                echo '<img style="width: 250px;height:220px" src="' . $row['image'] . '" class="img-fluid">';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<ul class="footer_itmes">';
                echo '<li><p><b>' . $row['city'] . '</b></p></li>';
                echo '<li><p><b>' . $row['state'] . '</b></p></li>';
                echo '<li><p><b>' . $row['date'] . '</b></p></li>';
                echo '</ul>';
                echo '<p id="d">' . $row['details'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
            // Display Read More button below the cards
            echo '<div class="container">';
            echo '<a id="btn" href="all_items_page.php" class="btn ">Read More</a>';
            echo '</div>';
        } else {
            echo '<p>No records found</p>';
        }

        mysqli_free_result($result);


       
        ?>

    </div>
</div>

<div id="footer">
    <div class="one">
<h6>About us</h6>
<p>Our goal is to make it easier for people to recover their valuable belongings.</p>
    </div>
    <div class="twoo">
<h6>Contact us</h6>
<p>(+90) 000 000 000</p>
<p>Belongingback@gmail.com</p>
    </div>
    <div class="three">
<img src="/img/logo11-removebg-preview.png" alt="">
<p>Home | Report | About</p>
<p>&copy; 2024 Lost & Found</p>
    </div>
    <!-- <p>&copy; 2024 Lost & Found</p>
    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p> -->
</div>

<script src="/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

</body>
</html>
