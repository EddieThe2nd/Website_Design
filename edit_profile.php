<?php
session_start();
require('./config/server.php');

// Check if the user is logged in
$user_id = $_SESSION['user_id'];

// Check if the form is submitted
if (isset($_POST['save-button'])) {
    // Retrieve the form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $idNumber = $_POST['idNumber'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];

    // Prepare and execute the query to update the user details
    $stmt = $connection->prepare("UPDATE `users` SET `first_name`=?, `last_name`=?, `age`=?, `gender`=?, `Id_number`=?, `contact_no`=?, `Bio`=? WHERE `user_id`=?");
    $stmt->bind_param("ssississ", $name, $surname, $age, $gender, $idNumber, $phone, $bio, $user_id);
    $stmt->execute();

    // Redirect to the display page
    header("Location: profile.php");
    exit;
}

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
$phone = $row['contact_no'];
$bio = $row['Bio'];

$stmt->close();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
    // Check if a file is uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) 
    {
        $file = $_FILES['profile_picture'];

        // Specify the directory to save the uploaded file
        $upload_dir = './profile_pictures/';

        // Generate a unique file name for the uploaded picture
        $file_name = uniqid() . '_' . $file['name'];

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)) {
            // Update the user's profile picture in the database
            $stmt = $connection->prepare("UPDATE `users` SET `profile_picture` = ? WHERE `user_id` = ?");
            $stmt->bind_param("si", $file_name, $user_id);
            $stmt->execute();
            $stmt->close();

            // Redirect back to the profile page
            header("Location: profile.php");
            exit;
        } else {
            // Error moving the uploaded file
            $error_message = "Error uploading the profile picture.";
        }
    } else {
        // No file uploaded or error uploading the file
        $error_message = "Please select a valid profile picture.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Eclat</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <section>
                <div class="box">
                <label for="name" class="form-label">Profile Pic</label><br>
                    <?php if (isset($error_message)) : ?>
                        <p class="error"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile_picture" accept=".jpg, .jpeg, .png">
                        <button type="submit">Upload</button>
                    </form>
                </div>
            </section>
        <form action="" method="POST">
            
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label><br>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Last Name</label><br>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $surname; ?>" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label><br>
                <input type="text" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $gender; ?>" required>
            </div>
            <div class="mb-3">
                <label for="idNumber" class="form-label">ID Number</label><br>
                <input type="text" class="form-control" id="idNumber" name="idNumber" value="<?php echo $idNumber; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label><br>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label><br>
                <textarea class="form-control" id="bio" name="bio"><?php echo $bio; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="save-button">Save</button>
        </form>
    </div>
</body>
</html>
