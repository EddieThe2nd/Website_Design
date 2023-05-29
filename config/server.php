<?php
session_start();

$server_name = 'localhost';
$host = 'root';
$password_ = "";
$db_name = 'tera_db';

$connection = mysqli_connect($server_name, $host, $password_, $db_name);

if(!$connection)
{
    die('Connection Failed: ' . mysqli_connect_error());
}

if(isset($_SESSION['username']) &&  isset($_SESSION['email'])) 
{
    $user = $_SESSION['username'];
    $Email = $_SESSION['email'];
}

if(isset($_POST['signup']))
{
    $username = $_POST["username"];
    $surname = $_POST["surname"];
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
    

    // Check if the user is logged in
    if (!isset($_SESSION['id'])) 
    {
        // Redirect to the login page or display an error message
        header("Location: LoginPage.php");
        exit;
    }
    
    
    
}