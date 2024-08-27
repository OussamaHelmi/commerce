<?php
include('../Db_connection.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>

</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="manageItem.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">manage item</span>
                </a></li>
                <li><a href="#">
                <i class=" uil-users-alt"></i>
                    <span class="link-name">users</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >BelongingBack<b style="color: #06C167; "></b></p>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <br>
        <br>
        <br>
    
  

            <div class="activity">
            <?php


$sql = "SELECT id, fullname, Email, phoneno FROM login_users";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>phoneno</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

    // Output data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["phoneno"] . "</td>";
        // Change the button to a remove button
        echo "<td><button onclick='removeUser(" . $row["id"] . ")'>Delete</button></td>";
        echo "</tr>";
    }

    // Close table body and table
    echo "</tbody></table>";
} else {
    // If no results found
    echo "0 results";
}

// Close the database connection
$conn->close();
?>

            </div>
    </section>
    <script>
    function removeUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            // Send an AJAX request to remove the user
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "remove_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // User removed successfully, you can update the UI if needed
                        alert("User removed successfully!");
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        // Error occurred while removing the user
                        alert("Error occurred while removing the user.");
                    }
                }
            };
            xhr.send("userId=" + userId);
        }
    }
</script>


<script src="script.js"></script>
</body>
</html>
