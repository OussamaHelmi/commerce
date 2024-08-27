<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lost&found_report.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.css">
    <title>Form</title>
</head>
<body>
    
<?php
include('includes/header.php');


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit; 
}

?>
<?php

include('Db_connection.php'); 
$userID = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    //$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    //$phoneNo = isset($_POST['phoneNo']) ? $_POST['phoneNo'] : '';
    $itemType = isset($_POST['itemType']) ? $_POST['itemType'] : '';
    $contactPurpose = isset($_POST['contactPurpose']) ? $_POST['contactPurpose'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $details = isset($_POST['details']) ? $_POST['details'] : '';

    // Upload image
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

   
    $sql = "INSERT INTO lost_found_items (userID, itemType, contactPurpose, date, location, city, state, details, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "issssssss", $userID, $itemType, $contactPurpose, $date, $location, $city, $state, $details, $targetFile);
    mysqli_stmt_execute($stmt);


    if (mysqli_stmt_affected_rows($stmt) > 0) {
        
        echo '<script>alert("Post added successfully");</script>';
    } else {
        echo "Error adding post: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($conn);
}
}
mysqli_close($conn);


?>


<div id="s" class="container">
    <form action="lost&found_report.php" method="post" enctype="multipart/form-data">
        <div id="types">
        <label style="padding-top: 20px;" for="itemType">Type of Item:</label>
        <select name="itemType" required>
            <option value="phone">Phone</option>
            <option value="wallet">Wallet</option>
            <option value="key">Key</option>
            <option value="other">Other</option>
        </select><br>
        </div>

        <label>What is your purpose of contact?</label>
        <div class="radio-group">
            <label><input type="radio" name="contactPurpose" value="lost" required> Lost Item</label>
            <label><input type="radio" name="contactPurpose" value="found" required> Found Item</label>
        </div>

        <label style="padding-top: 11px;" for="date">When did you lose/found the item?</label>
        <input class="form-control" type="date" name="date" required>

        <label for="location">Where did you lose/found the item?</label>
        <input class="form-control" type="text" name="location" required>

        <label for="city">City:</label>
        <input class="form-control" type="text" name="city" required>

        <label for="state">State/Province:</label>
        <input class="form-control" type="text" name="state" required>

        <label for="details">Details about the item:</label>
        <textarea class="form-control" name="details" rows="4" required></textarea>

        <label for="image">Upload an image of the item:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Submit</button>

    </form>
</div>
<script>
    // Check if the alertMessage is not empty, then display an alert
    <?php if (!empty($alertMessage)) : ?>
        alert('<?php echo $alertMessage; ?>');
    <?php endif; ?>
</script>
<?php
include('includes/footer.php');
?>
