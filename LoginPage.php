<?php
Session_start();
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
        $storedId = $row['user_id'];

        $_SESSION['user_id'] = $storedId;
        

        if (password_verify($password, $storedPassword)) 
        {
            $_SESSION['username'] = $row['username'];
            
            // $_SESSION['email'] = $row['email'];
            header("Location: loadingpage.php");
            exit();
        } 
        else 
        {
            echo "Invalid password";
        }
    } 
    else if($username === 'Admin' && $password === 'Admin')
    {
        header("Location: dashboard.php");
        exit();
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
    <title>Login Form</title>

    <link rel="stylesheet" href="CSS-Folder/style.css">
</head>
<body>
    
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="username" required placeholder="enter your username">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="login" value="login now" class="form-btn">
            <p>don't have an account? <a href="register_form.php">register now</a></p>
        </form>
    </div>
</body>
</html>