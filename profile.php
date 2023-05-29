<?php
require('./config/server.php');

// Check if the user is logged in

// if (!isset($_SESSION['user_id'])) {
//     // Redirect to the login page or display an error message
//     header("Location: login.php");
//     exit;
// }

// Retrieve the user ID from the session
$user_id = 6;

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="./display.css">
</head>
<body>
    <section>
        

        <div class="box">
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
            <a href="edit_profile.php">Edit Profile</a>
        </div>
    </section>
</body>
</html>
