<?php
Session_start();
require('./config/server.php');

// Check if the user is logged in

// if (!isset($_SESSION['user_id'])) {
//     // Redirect to the login page or display an error message
//     header("Location: login.php");
//     exit;
// }

// Retrieve the user ID from the session
$user_id =  $_SESSION['user_id'];

// Retrieve the user details from the database
$stmt = $connection->prepare("SELECT * FROM `users` WHERE `user_id`=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Check if the user exists
if (!$row) {
    // Redirect to the error page or display an error message
    header("Location: error.php");
    exit;
}

// Retrieve the user details
$name = $row['first_name'];
$surname = $row['last_name'];
$age = $row['age'];
$gender = $row['gender'];
$idNumber = $row['Id_number'];
$email = $row['email'];
$phone = $row['contact_no'];
$bio = $row['Bio'];

$stmt->close();

// Retrieve the user's profile picture from the database
$stmt = $connection->prepare("SELECT `profile_picture` FROM `users` WHERE `user_id` = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($profile_picture);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Eclat</title>
    <link rel="stylesheet" href="profile.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .details {
            margin-bottom: 20px;
        }

        p {
            margin: 8px 0;
        }

        .back-button {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #555;
        }

        .back-button i {
            margin-right: 5px;
        }

        .edit-button {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        .edit-button:hover {
            background-color: #555;
        }

        .edit-button i {
            margin-right: 5px;
        }
        .profile-picture {
        max-width: 400px;
        max-height: 400px;
        margin-bottom: 20px;
    }
    
    </style>
</head>
<body>
    <section>
        <div class="box">
        <h2>Profile</h2>
            <?php if ($profile_picture) : ?>
                <img src="./profile_pictures/<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-picture">
            <?php else : ?>
                <p>No profile picture available.</p>
            <?php endif; ?>
            <!-- Additional profile details -->

            <!-- <img src="<?php echo $row['profile_picture']; ?>" alt="Profile Picture" class="profile-pic"> -->
            <h2>User Details</h2>

            
            <div class="details">
                <p><strong>Name:</strong> <?php echo $name; ?></p>
                <p><strong>Surname:</strong> <?php echo $surname; ?></p>
                <p><strong>Age:</strong> <?php echo $age; ?></p>
                <p><strong>Gender:</strong> <?php echo $gender; ?></p>
                <p><strong>ID Number:</strong> <?php echo $idNumber; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $phone; ?></p>
                <p><strong>Bio:</strong> <?php echo $bio; ?></p>
            </div>
            <a href="HomePageUser.php" class="back-button"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="edit_profile.php" class="edit-button"><i class="fa fa-edit"></i> Edit</a>
        </div>
    </section>
</body>
</html>