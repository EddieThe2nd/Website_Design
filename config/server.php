<?php
session_start();
$server_name = 'localhost';
$host = 'root';
$password_ = "";
$db_name = 'technolab';

$connection = mysqli_connect($server_name, $host, $password_, $db_name);

if(!$connection)
{
    die('Connection Failed: ' . mysqli_connect_error());
}

if(isset($_SESSION['username']) && isset($_SESSION['surname']) && isset($_SESSION['email'])) 
{
    $user = $_SESSION['username'];
    $Sname = $_SESSION['surname'];
    $Email = $_SESSION['email'];
}

if(isset($_POST['signup']))
{
    $username = $_POST["username"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["C_password"];

    // Validate form fields
    if (empty($username) || empty($surname) || empty($email) || empty($password) || empty($confirmPassword)) 
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

        $query = "INSERT INTO `members`(`username`, `surname`, `email`, `password`) VALUES ('$username','$surname','$email','$hashedPassword')";
        $Result = mysqli_query($connection,$query);

        if($Result === FALSE)
        {
            echo "Data not inserted. " . $connection->connect_error;
        }
        else
        {
            echo "<script>alert('Values inserted successfully into the members table');</script>";
            header("Location: HomePage.php");
            exit();
        }
    }
}