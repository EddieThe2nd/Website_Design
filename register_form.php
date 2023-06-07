<?php
require('./config/server.php');
if(isset($_POST['signup']))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["C_password"];
    $phone = $_POST["phone"];

    // Validate form fields
    if (empty($username)  || empty($email) || empty($password) || empty($confirmPassword) || empty($phone)) 
    {
        echo "Invalid input or one field missing";
    } 
    elseif ($password !== $confirmPassword) 
    {
        echo "Password and confirm password do not match";
    } 
    else 
    {
        // Encrypt password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `users`(`username`,  `email`, `password`, `contact_no`) VALUES ('$username','$email','$hashedPassword','$phone')";
        $Result = mysqli_query($connection,$query);

        if($Result === FALSE)
        {
            echo "Data not inserted. " . $connection->connect_error;
        }
        else
        {
            echo "Data inserted successfully.";
            header("Location: LoginPage.php");
            exit();
        }
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

    <link rel="stylesheet" href="CSS-Folder/style.css">
</head>
<body>
    
    <div class="form-container">
        <form action="" method="post">
            <h3>Register now</h3>
            <!-- <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?> -->
            <input type="text" name = "username" required placeholder="enter username">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name = "C_password" required placeholder="confirm your password">
            <input type="text" name="phone" required placeholder="Phone">
            <!-- <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select> -->
            <input type="submit" name="signup" value="register now" class="form-btn">
            <p>Already have an account? <a href="LoginPage.php">login now</a></p>
        </form>
    </div>
</body>
</html>