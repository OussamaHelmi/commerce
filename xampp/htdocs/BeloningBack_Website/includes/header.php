<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/includes/header.css">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
<?php
  
include('Db_connection.php');

?>

<nav id="nav" class="navbar navbar-expand-lg navbar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-sm-2">
                <a class="navbar-brand" href="homepagee.php"><img style="width: 100%;" src="/img/logo11-removebg-preview.png"></a>
            </div>
            
          
            <div class="col-sm-3">
                <?php
           
                echo '<a class="navbar-brand" href="all_items_page.php">Categories</a>';
                echo '<a class="navbar-brand" href="lost&found_report.php">Lost&found Report</a>';
                echo '<a class="navbar-brand" href="aboutuspage.php">About us</a>';
                ?>
            </div>
            
            <!-- Search Bar -->
            <div class="col-sm-4">
            <form id="search" class="d-flex" action="search.php" method="GET"> <!-- Adjust action to your search handling script -->
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> Optional: Add a search button -->
    </form>
            </div>
            
            <!-- Login/Signup or Dropdown -->
            <div id="sp" class="col-sm-2">
                <?php
                if (isset($_SESSION["user"])) {
                    
                    echo '<div class="dropdown">';
                    echo '<a class="navbar-brand dropdown-toggle account-dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">' . $_SESSION["user"]["Fullname"] . '</a>';
                    echo '<ul class="dropdown-menu account-menu" aria-labelledby="dropdownMenuLink">';
                    echo '<li><a class="dropdown-item" href="userpost.php">My Posts</a></li>';
                    echo '<li><a class="dropdown-item" href="logout.php">Log out</a></li>';
                    echo '</ul>';
                    echo '</div>';
                } else {
                    
                    echo '<a class="navbar-brand log" href="login.php">Login</a>';
                    echo '<a class="navbar-brand signup" href="Signup.php">Sign up</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
