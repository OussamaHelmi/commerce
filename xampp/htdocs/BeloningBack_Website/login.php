<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    
    <?php
    include('includes/header.php');
    ?>
    <div id="container" class="container">
        <?php
        if (isset($_POST["login"])) { 
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "db_connection.php";
            $sql = "SELECT * FROM login_users WHERE email ='$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                if (password_verify($password, $user["Password"])) {
                    session_start();
                    $_SESSION["user"] = $user; // Store user data in session
                    if ($user["role"] == "admin") {
                        header("Location: ../admin/admin.php"); 
                    } else {
                        header("Location: homepagee.php"); 
                    }
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not exist</div>";
            }
        }
        ?>
        <form id="loginbox" action="login.php" method="post">
            <h2 style="text-align: center;">Login</h2><br>
            <input class="form-control" type="email" name="email" placeholder="Email"><br>
            <input type="password" class="form-control" name="password" placeholder="Password"><br>
            <button class="form-control" type="submit" name="login">Login</button><br>
            <p style="margin-top: -5px;">Don't have an account?<a href="#">Sign up</a></p>
        </form>
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
