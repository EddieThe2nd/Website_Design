<?php
Session_start();
require('../config/server.php');


// Retrieve the user ID from the session
$user_id =  $_SESSION['user_id'];
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

$email = $row['email'];
$phone = $row['contact_no'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="orderstyle.css">
</head>
<body>

    <div class="container">
        <button type="submit" onclick="openPopup()" class ="btn" name = submit>ORDER COMPLETE</button>
            <div class="popup" id="popup">
                <img src="./images/order complete.png" alt="">
                <h2>Thank you</h2>
                <p><?php echo("HI, $name $surname \nYour order has been sent for shipping and an invoice has been sent to the following email address:\n\n$email")?></p>
                <button type="submit" id="closeup">OK</button>
            </div>
    </div>
    <script>

        let popup = document.getElementById("popup");

        function openPopup()
        {
            popup.classList.add("open-popup");
        }
        const EditButton = document.getElementById('closeup');


        EditButton.addEventListener('click', (event) => 
        {
            event.preventDefault(); // Prevent the default form submission
            window.location.href = '../HomePageUser.php';
        }); 
    </script>
</body>
</html>