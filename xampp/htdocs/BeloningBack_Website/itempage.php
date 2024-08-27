<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/itempage.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>itempage</title>
</head>
<body>
    <?php
     include('includes/header.php');
    ?>
    <div class="test">
    <div class="whole">
        <?php
       
      

        
        if (isset($_GET['id'])) {
     
            $itemId = $_GET['id'];

       
            include('Db_connection.php');

            $sql = "SELECT i.*, l.Fullname, l.Phoneno FROM lost_found_items i
                    INNER JOIN login_users l ON i.userID = l.id
                    WHERE i.id = ?";
            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "i", $itemId);

            mysqli_stmt_execute($stmt);

    
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
            
                if (isset($_SESSION['user'])) {
                    echo '<div class="content">';
                    echo '<div class="one">';
    
                    echo '<div class="contact_info">';
                    echo '<h6>Contact Info</h6>';
                    echo '<p>Name: ' . $row['Fullname'] . '</p>';
                    echo '<p>Phone No: ' . $row['Phoneno'] . '</p>';
                    echo '</div>';
                } else {
                    
                    echo '<h6>Contact Info</h6>';
                    echo '<p>You need to login to view contact information. <a id="link" href="login.php">Login</a></p>';
                }

                echo '<div class="contnaire">';
                echo '<div class="left">';
                echo '<div class="detalis_info">';
                echo '<h6>Details</h6>';
                echo '<p>Date: ' . $row['date'] . '</p>';
                echo '<p>City: ' . $row['city'] . '</p>';
                echo '<p>State: ' . $row['state'] . '</p>';
                echo '<p>Details: ' . $row['details'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>'; 

                echo '<div class="two">';
                echo '<div class="right">';
                echo '<h6>Image</h6>';
                echo '<img id="image" src="' . $row['image'] . '" alt="Item Image">';
                echo '</div>';
                echo '</div>';

                echo '</div>';

            } else {
                echo '<p>No item found with the provided ID</p>';
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo '<p>No item ID provided</p>';
        }
        ?>
    </div>
    </div>
    <div id="footer">
    <div class="first">
<h5>About us</h5>
<p>Our goal is to make it easier for people to recover their valuable belongings.</p>
    </div>
    <div class="second">
<h5>Contact us</h5>
<p>(+90) 000 000 000</p>
<p>Belongingback@gmail.com</p>
    </div>
    <div class="third">
<img src="/img/logo11-removebg-preview.png" alt="">
<p>Home | Report | About</p>
<p>&copy; 2024 Lost & Found</p>
    </div>
    <!-- <p>&copy; 2024 Lost & Found</p>
    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p> -->
</div>
</body>
</html>
