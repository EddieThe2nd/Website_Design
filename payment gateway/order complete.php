<?php
session_start();
require('../config/server.php');

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];
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

if (isset($_POST['closeup'])) 
{
    $cart_query = mysqli_query($connection, "SELECT * FROM `cart`");
    $price_total = 0;
    $product_name = array(); // Initialize the array before the loop

    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . '(' . $product_item['quantity'] . ')';
            $product_price = $product_item['item'] * $product_item['quantity'];
            $price_total += $product_price;
        }
    }

    $total_product = implode(',', $product_name);

    // Prepare and bind
    $stmt = $connection->prepare("INSERT INTO `orders`(`user_id`, `name`, `surname`, `email`, `total_products`, `total_price`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssi", $user_id, $name, $surname, $email, $total_product, $price_total);

    // Execute the prepared statement
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Order added successfully!";
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
    <title>Document</title>
    <link rel="stylesheet" href="orderstyle.css">
</head>
<body>
    <div class="container">
        <button type="submit" onclick="openPopup()" class="btn" name="submit">ORDER COMPLETE</button>
        <form action="../HomePageUser.php" method="post">
            <div class="popup" id="popup">
                <img src="./images/order complete.png" alt="">
                <h2>Thank you</h2>
                <p><?php echo ("HI, $name $surname\nYour order has been sent for shipping and an invoice has been sent to the following email address:\n\n$email")?></p>
                <button type="submit" id="closeup" name="closeup">OK</button>
            </div>
        </form>
    </div>
    <script>
        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }
    </script>
</body>
</html>
