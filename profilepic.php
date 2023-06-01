<?php


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file is uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
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
    <title>Change Profile Picture</title>
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

    p {
        margin: 8px 0;
    }

    input[type="file"] {
        margin-bottom: 10px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
    <section>
        <div class="box">
            <h2>Change Profile Picture</h2>

            <?php if (isset($error_message)) : ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="profile_picture" accept=".jpg, .jpeg, .png">
                <button type="submit">Upload</button>
            </form>
        </div>
    </section>
</body>
</html>
