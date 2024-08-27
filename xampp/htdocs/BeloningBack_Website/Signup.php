<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>SignUp</title>
</head>
<body>
<?php
include('includes/header.php');


include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fullname = $_POST["fullname"];
    $Email = $_POST["Email"];
    $Phoneno = $_POST["Phoneno"];
    $Password = $_POST["Password"];
    $passwordRepeat = $_POST["ConPassword"];

    $PasswordHash = password_hash($Password, PASSWORD_DEFAULT);
    $errors = array();

    if (empty($Fullname) || empty($Email) || empty($Phoneno) || empty($Password) || empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }

    if (strlen($Password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    if ($Password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    if (empty($errors)) {

        $checkEmailQuery = "SELECT * FROM login_users WHERE Email = ?";
        $checkStmt = mysqli_stmt_init($conn);
        $checkPrepareStmt = mysqli_stmt_prepare($checkStmt, $checkEmailQuery);

        if ($checkPrepareStmt) {
            mysqli_stmt_bind_param($checkStmt, "s", $Email);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_store_result($checkStmt);

            if (mysqli_stmt_num_rows($checkStmt) > 0) {
          
                echo "<div class='alert alert-danger'>Email already exists. Please use a different email address.</div>";
            } else {
           
                $role = "user"; 
                $insertQuery = "INSERT INTO login_users(fullname, Email, Phoneno, Password, role) VALUES (?, ?, ?, ?, ?)";
                $insertStmt = mysqli_stmt_init($conn);
                $insertPrepareStmt = mysqli_stmt_prepare($insertStmt, $insertQuery);

                if ($insertPrepareStmt) {
                    mysqli_stmt_bind_param($insertStmt, "sssss", $Fullname, $Email, $Phoneno, $PasswordHash, $role);
                    mysqli_stmt_execute($insertStmt);
                    echo "<div class='alert alert-success'>You are registered successfully</div>";
                } else {
                    die("Something went wrong");
                }
            }
        } else {
            die("Something went wrong while checking email existence");
        }
    } else {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}
?>

<div id="signup_form" class="container">
    <form action="Signup.php" method="post">
        <h3 style="text-align: center;padding:5px">Sign up</h3>
        <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full name"><br>
        <input class="form-control" type="email" name="Email" id="Email" placeholder="Email"><br>
        <input class="form-control" type="number"  name="Phoneno" id="Phoneno" placeholder="Phone number"><br>
        <input class="form-control" type="password" name="Password" id="Password" placeholder="Password"><br>
        <input class="form-control" type="password" name="ConPassword" id="ConPassword" placeholder="Confirm password"><br>
        <button class="form-control" type="submit" id="submit" name="submit">Sign up</button>
        <p style="margin-top: 20px;">Already have an account?<a href="login.php">Log in</a></p>
    </form>
</div>

<?php
include('includes/footer.php');
?>

</body>
</html>
