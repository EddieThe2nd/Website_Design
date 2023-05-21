<?php
    require('./config/server.php');

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the save button is clicked
        if (isset($_POST['save-button'])) {
            // Retrieve the form data
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $idNumber = $_POST['id-number'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $bio = $_POST['bio'];

            // Retrieve the user ID from the session
            session_start();
            $user_id = $_SESSION['user_id'];

            // Update the user details in the database
            $sql = "UPDATE `users` SET `first_name`='$name', `last_name`='$surname', `age`='$age', `gender`='$gender', `Id_number`='$idNumber', `email`='$email', `contact_no`='$phone', `Bio`='$bio' WHERE `user_id` = $user_id";

            // Execute the query
            $result = mysqli_query($connection, $sql);

            if ($result === TRUE) {
                // Redirect to the profile page or display a success message
                header("Location: profile.php");
                exit;
            } else {
                // Redirect to the error page or display an error message
                header("Location: error.php");
                exit;
            }
        }
        
        // Check if the delete button is clicked
        if (isset($_POST['delete-button'])) {
            // Delete the user's profile or perform the necessary actions
            // ...

            // Redirect to the home page or display a success message
            header("Location: HomePage.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJ-DesignEclat</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="edit_profile.css">
</head>
<body>
    <form action="" method="POST">
        <div class="profile-container">
            <div class="profile-header">
                <h1>Edit Profile</h1>
            </div>
            <div class="profile-body">
                <div class="profile-picture text-center">
                    <img id="profile-pic" src="default-profile-pic.jpg" alt="Profile Picture" class="img-fluid">
                    <input type="file" id="profile-pic-input" name="profile-pic">
                </div>
                <div class="profile-details">
                    <h2>Details</h2>
                    <div class="details-row">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="details-row">
                        <label for="surname" class="form-label">Surname:</label>
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your surname">
                    </div>
                    <div class="details-row">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" id="age" name="age" class="form-control" placeholder="Enter your age">
                    </div>
                    <div class="details-row">
                        <label for="gender" class="form-label">Gender:</label>
                        <input type="text" id="gender" name="gender" class="form-control" placeholder="Enter your gender">
                    </div>
                    <div class="details-row">
                        <label for="id-number" class="form-label">ID Number:</label>
                        <input type="text" id="id-number" name="id-number" class="form-control" placeholder="Enter your ID number">
                    </div>
                    <div class="details-row">
                        <label for="email" class="form-label">Email Address:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address">
                    </div>
                    <div class="details-row">
                        <label for="phone" class="form-label">Phone Number:</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                    </div>
                    <div class="details-row">
                        <label for="bio" class="form-label">Bio:</label>
                        <textarea id="bio" name="bio" class="form-control" placeholder="Enter your bio"></textarea>
                    </div>
                    <div class="button-row">
                        <button id="save-button" name="save-button" class="btn btn-primary">Save</button>
                        <button id="delete-button" name="delete-button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
