<?php
require('./config/server.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the form data (you can add your own validation here)

    // Prepare the query to fetch the user
    $stmt = $connection->prepare("SELECT `user_id`, `password` FROM `users` WHERE `username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Verify the user password
    if ($row && password_verify($password, $row['password'])) 
    {
        // Start the session
        session_start();

        // Set the user ID in the session
        $_SESSION['user_id'] = $row['user_id'];

        // Redirect to the profile page
        header("Location: profile.php");
        exit;
    } 
    else 
    {
        // Invalid email or password, redirect to the login page or display an error message
        header("Location: LoginPage.php?error=1");
        exit;
    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./LoginPage.css">

</head>
<body>
    <section>
        <a href="#"><img id="Logo-header" src="./Images/Design Eclat-TransparentBlueTree.png" alt=""></a>

        <div class="box">
            <form  action = "HomePageUser.php" method = "POST">
                
                <h2>Sign in</h2>
                <div class="inputBox">
                    <input id="username" type="text"  name = "username" id="username" placeholder = "Enter Username" required>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input id="password" type="password" required="required" id="password" placeholder = "Enter Password">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="#">Forgot Password ?</a>
                    <a href="signup.php">Signup</a>
                </div>
                <input id="login" type="submit" name = "login" value="Login">
            </form>
        </div>

    </section>
    <!-- <script src="Login.js"></script> -->
</body>
</html>