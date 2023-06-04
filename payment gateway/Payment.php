<?php
Session_start();
require('../config/server.php');


// Retrieve the user ID from the session
$user_id =  $_SESSION['user_id'];

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

$email = $row['email'];
$phone = $row['contact_no'];


$stmt->close();
if (isset($_POST['Proceed'])) 
{
// Prepare and bind for address table
$stmt_address = $connection->prepare("INSERT INTO address (`user_id`, `full_name`, `email`, `address`, `city`, `state`, `zip_code`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt_address->bind_param("issssss", $user_id, $full_name, $email, $address, $city, $state, $zip_code);

// Set parameters and execute for address table
$full_name = $name ." ". $surname;
// $Email = $email;
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$stmt_address->execute();

// Prepare and bind for card_sessions table
$stmt_card = $connection->prepare("INSERT INTO card_sessions (user_id, card_holder_name, card_number, expiration_month, expiration_year, cvv) VALUES (?, ?, ?, ?, ?, ?)");
$stmt_card->bind_param("isssis", $user_id, $card_holder_name, $card_number, $expiration_month, $expiration_year, $cvv);

// Set parameters and execute for card_sessions table
$card_holder_name = $_POST['card_holder_name'];
$card_number = $_POST['card_number'];
$expiration_month = $_POST['expiration_month'];
$expiration_year = $_POST['expiration_year'];
$cvv = $_POST['cvv'];
$stmt_card->execute();

$stmt_address->close();
$stmt_card->close();
$connection->close();

header("Location: order complete.php"); //redirect to success page after inserting the data
exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name ="full_name" placeholder="<?php echo ("$name $surname"); ?> "readonly>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email"    placeholder="<?php echo $email; ?>"readonly>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name ="address" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city"placeholder="Soweto">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" placeholder="Limpopo">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" name="zip_code" placeholder="123 456">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="MR BEAN" name="card_holder_name">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name = "card_number">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" name="expiration_month">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" name="expiration_year">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" name="cvv">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn" name="Proceed">
        

    </form>

</div>    
    
</body>
</html>