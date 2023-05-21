<?php
    
    require('./config/server.php');
    
    // Assuming you have the user ID stored in a variable, retrieve the user's information from the database
    $userId = 3; // Replace with the actual user ID
    
    $sql = "SELECT * FROM `users` WHERE `user_id` = $userId";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Assign the retrieved values to variables
        $name = $row['first_name'];
        $surname = $row['last_name'];
        $age = $row['age'];
        $gender = $row['gender'];
        $idNumber = $row['Id_number'];
        $email = $row['email'];
        $phone = $row['contact_no'];
        $bio = $row['Bio'];
    } else {
        // Handle the case where the user is not found in the database
        // ...
    }

    // Rest of your code
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-pic">
        <img src="./FeaturedProductsImages/userpic.jpg" alt="Profile Picture">
    </div>
    <div class="details">
        <h2><?php echo $name . ' ' . $surname; ?></h2>
        <button class="edit-btn" id="editBtn" onclick="window.location.href = 'edit_profile.php';">Edit</button>
        <ul>
            <li><strong>Surname:</strong> <?php echo $surname; ?></li>
            <li><strong>Age:</strong> <?php echo $age; ?></li>
            <li><strong>Gender:</strong> <?php echo $gender; ?></li>
            <li><strong>ID Number:</strong> <?php echo $idNumber; ?></li>
            <li><strong>Email Address:</strong> <?php echo $email; ?></li>
            <li><strong>Phone Number:</strong> <?php echo $phone; ?></li>
            <li><strong>Bio:</strong> <?php echo $bio; ?></li>
        </ul>
    </div>
    <!-- <script src="profile.js"></script> -->
</body>
</html>
