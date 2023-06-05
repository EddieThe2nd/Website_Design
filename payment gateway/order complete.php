<?php
session_start();
require('../config/server.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $connection->prepare("SELECT * FROM `users` WHERE `user_id` = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $name = $row['first_name'];
        $surname = $row['last_name'];
        $email = $row['email'];
        $phone = $row['contact_no'];

        if (isset($_POST['submit'])) {
            $cart_query = mysqli_query($connection, "SELECT * FROM `cart` WHERE `user_id`='$user_id'");
            $price_total = 0;
            $product_name = [];

            if (mysqli_num_rows($cart_query) > 0) {
                while ($product_item = mysqli_fetch_assoc($cart_query)) {
                    $product_name[] = $product_item['name'] . '(' . $product_item['quantity'] . ')';
                    $product_price = $product_item['price'] * $product_item['quantity'];
                    $price_total += $product_price;
                }
            }

            $total_product = implode(',', $product_name);

            $stmt = $connection->prepare("INSERT INTO `orders`(`user_id`, `name`, `surname`, `email`, `total_products`, `total_price`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssi", $user_id, $name, $surname, $email, $total_product, $price_total);
            mysqli_query($connection,"DELETE FROM `cart` WHERE user_id='$user_id'");

            if ($stmt->execute()) {
                $order_id = $stmt->insert_id;

                $address_query = mysqli_query($connection, "SELECT * FROM `address` WHERE `user_id`='$user_id'");
                $address_row = mysqli_fetch_assoc($address_query);

                if ($address_row) {
                    $address = $address_row['address'];
                    $city = $address_row['city'];
                    $state = $address_row['state'];
                    $zip_code = $address_row['zip_code'];

                    $delivery_stmt = $connection->prepare("INSERT INTO `deliveries`(`order_id`, `user_id`, `total_products`, `price`, `address`, `city`, `state`, `zip_code`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $delivery_stmt->bind_param("iissssss", $order_id, $user_id, $total_product, $price_total, $address, $city, $state, $zip_code);

                    if ($delivery_stmt->execute()) {
                        echo "Order and delivery details added successfully!";
                    } else {
                        echo "Error: " . $delivery_stmt->error;
                    }

                    $delivery_stmt->close();
                } else {
                    echo "Error: Address details not found!";
                }
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        // Redirect to the error page or display an error message
        header("Location: error.php");
        exit;
    }
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
<div class="wrap">
        <img src="../payment gateway/Delivery Animation/truck2.png" alt="" class="image truck-img">
        <img src="../payment gateway/Delivery Animation/box.png" alt="" class="image box-img">
        <img src="../payment gateway/Delivery Animation/box.png" alt="" class="image box-img box-img2">
    </div>
    <div class="container">

        <form action="" method="post">
            <button type="submit" class="btnComplete" name="submit">ORDER COMPLETE</button>
        </form>
        <button type="submit" onclick="openPopup()" class="btnNext">NEXT</button>



        <form action="../HomePageUser.php" method="post">
            <div class="popup" id="popup">
                <img src="./images/order complete.png" alt="">
                <h2>Thank you</h2>
                <p><?php echo "HI, $name $surname\nYour order has been sent for shipping and an invoice will been sent to the following email address:\n\n$email"; ?></p>
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
