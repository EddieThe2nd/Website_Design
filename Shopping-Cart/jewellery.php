<?php
include 'connection.php';
include 'headerPages.php';

// Fetch the product data from the database
$query = "SELECT * FROM `products` WHERE `image` LIKE '%jewellery%'";
$result = mysqli_query($connection, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_POST['add_to_cart'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = 1;
    
    $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name='$name'");
    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'Product already added in your cart';
    } else{
        $query = "INSERT INTO `cart`(`name`, `price`, `image`, `quantity`) VALUES ('$name','$price','$image','$quantity')";
        $insert_query = mysqli_query($connection, $query);
        if($insert_query){
            $message[] = 'Product added in your cart';
        } else{
            $message[] = 'Error adding product to cart';
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
    <title>Jewellery Page</title>
    <link rel="stylesheet" href="jewellery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
</head>
<body>
<header id="header">
        <a  href="#"><img id="Logo-header" src="DesignEclatlogo1.png" alt="im not available"></a>
        <div class="menu-btn"></div>
        <div class="navigation">
            <div class="navigation-items">
            <?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $previousPage = $_SERVER['HTTP_REFERER'];
} else {
    $previousPage = 'javascript:history.go(-1)';
}
?>

<a href="<?php echo $previousPage; ?>">Back</a>
                <a href="./AboutUs-Page/AboutUsPage.php">About</a>
                <a href="./fashion.php">Fashion</a>
                <a href="./art.php">Art</a>
                <a href="./Artists/ArtistPage.php">Artists</a>
                <a href="./email-form">Contact</a>
                <a href="cart.php" class="cart"><i class="fas fa-shopping-cart"></i><span><?php echo $row_count; ?></span></a>

               
            </div>
        </div>
    </header>
    <h1>Jewellery</h1>

    <?php
    if(isset($message)){
        foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
        }
    }
    ?>

    <?php foreach ($products as $product): ?>
        <div class="product">
            <h2><?php echo $product['name']; ?></h2>
            <p class="price">R<?php echo $product['price']; ?></p>
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
