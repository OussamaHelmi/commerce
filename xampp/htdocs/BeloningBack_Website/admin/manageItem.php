
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    <style>
        .remove-btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
}
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th:first-child,
    td:first-child {
    width: 5%; 
}
    th {
        background-color: #f2f2f2;
    }

    span{
        color: black;
    }
    #img{
        width: 110px;
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
                <li><a href="users.php">
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
           
            <p  class ="logo" >BelongingBack<b style="color: #06C167; "></b></p>
             <p class="user"></p>
            
          
        </div>
        <br>
        <br>
        <br>
    
  

            <div class="activity">
            <?php
include('../Db_connection.php');

$sql = "SELECT image, id, city, itemType, date, details, contactPurpose FROM lost_found_items";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                
                    <th>Item Type</th>
                    <th>City</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Contact Purpose</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

    // Output data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        // echo "<td><img id='img' src='".$row["image"] . "' alt='Image not found'></td>";
        echo "<td>" . $row["itemType"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["details"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["contactPurpose"] . " item</td>";
       
        echo "<td><button class='remove-btn' onclick='removeItem(" . $row["id"] . ")'><span  class='material-symbols-outlined'>
        delete
        </span></button></td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    
    echo "0 results";
}


$conn->close();
?>


            </div>
    </section>
    <script>
function removeItem(itemId) {
    if (confirm("Are you sure you want to remove this item?")) {
    
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "remove_item.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                 
                    alert("Item removed successfully!");
                    location.reload(); 
                } else {
                 
                    alert("Error occurred while removing the item.");
                }
            }
        };
        xhr.send("itemId=" + itemId);
    }
}
</script>

<script src="script.js"></script>

</body>
</html>