<?php

require('./config/server.php');


if (isset($_POST['login'])) 
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) 
    {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        if (password_verify($password, $storedPassword)) 
        {
            $_SESSION['username'] = $row['username'];
            
            // $_SESSION['email'] = $row['email'];
            header("Location: HomePageUser.php");
            exit();
        } 
        else 
        {
            echo "Invalid password";
        }
    } 
    else 
    {
        echo "Invalid username";
    }
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