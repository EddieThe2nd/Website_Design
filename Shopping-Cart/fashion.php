<?php
session_start();
include 'connection.php';
include 'headerPages.php';

// Fetch the fashion products from the database
$query = "SELECT * FROM `products` WHERE `image` LIKE '%fashion%'";
$result = mysqli_query($connection, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Create an array to hold the product details
    $product = array(
        'name' => $name,
        'price' => $price,
        'image' => $image
    );

    // Check if the shopping cart is already set in the session
    if (isset($_SESSION['cart'])) {
        // If the product is already in the cart, update the quantity
        if (array_key_exists($name, $_SESSION['cart'])) {
            $_SESSION['cart'][$name]['quantity'] += 1;
        } else {
            // Add the product to the existing cart
            $_SESSION['cart'][$name] = $product;
            $_SESSION['cart'][$name]['quantity'] = 1;
        }
    } else {
        // Create a new cart and add the product
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$name] = $product;
        $_SESSION['cart'][$name]['quantity'] = 1;
    }

    // Display a success message
    $message = "Product added to cart successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Page</title>
    <link rel="stylesheet" href="Fashion.css">
    
</head>
<body>
<header id="header">
        <a  href="#"><img id="Logo-header" src="DesignEclatlogo1.png" alt="im not available"></a>
        <div class="menu-btn"></div>
        <div class="navigation">
            <div class="navigation-items">
                <a href="./AboutUs-Page/AboutUsPage.php">About</a>
                <a href="./jewellery.php">Jewellery</a>
                <a href="./art.php">Art</a>
                <a href="./Artists/ArtistPage.php">Artists</a>
                <a href="./email-form">Contact</a>
                <a href="cart.php" class="cart"><i class='fas fa-shopping-cart'></i><span><?php echo $row_count; ?></span></a>
               
            </div>
        </div>
    </header>
    <h1>Fashion</h1>

    <?php if(isset($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php foreach ($products as $product): ?>
        <div class="product">
            <h2><?php echo $product['name']; ?></h2>
            <p class="price"><?php echo $product['price']; ?></p>
            <img src="image/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="200">
            <form action="" method="post">
                <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                <input type="submit" name="add_to_cart" value="Add to Cart" class="btn">
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
