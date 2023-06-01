<?php


$server_name = 'localhost';
$host = 'root';
$password_ = "";
$db_name = 'tera_db';

$connection = mysqli_connect($server_name, $host, $password_, $db_name);

if(!$connection)
{
    die('Connection Failed: ' . mysqli_connect_error());
}

// if(isset($_SESSION['username']) &&  isset($_SESSION['email'])) 
// {
//     $user = $_SESSION['username'];
//     $Email = $_SESSION['email'];
// }


