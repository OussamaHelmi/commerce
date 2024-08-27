
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    



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
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                
                <li><a href="manageItem.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">manage item</span>
                </a></li>
                <li><a href="users.php">
                <i class=" uil-users-alt"></i>
                    <span class="link-name">users</span>
                </a></li>
               
               
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
           
            <p  class ="logo" >BelongingBack <b style="color: #06C167; "></b></p>
             <p class="user"></p>
          
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i  class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
               

                <div class="boxes">
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <span class="text">Total users</span>
                        <span class="number">
                            <?php include('users_count.php'); ?>
                        </span>
                    </div>
           <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total ads</span>
                        <span class="number">
                            <?php include('posts_count.php'); ?>
                        </span>
                    </div>
                    
                </div>
            </div>

            



    </section>
    <script src="script.js"></script>
   
</html>