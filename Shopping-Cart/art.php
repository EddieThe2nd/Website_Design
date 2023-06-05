<?php
session_start();
include 'connection.php';
include 'headerPages.php';

// Fetch the product data from the database
$query = "SELECT * FROM `products` WHERE `image` LIKE '%art%'";
$result = mysqli_query($connection, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Retrieve the number of items in the cart for this user
$user_id = $_SESSION['user_id'];
$row_count_query = mysqli_query($connection, "SELECT SUM(`quantity`) AS `total` FROM `cart` WHERE user_id='$user_id'");
$data = mysqli_fetch_assoc($row_count_query);
$row_count = $data['total'] ?? 0;

if (isset($_POST['add_to_cart'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = 1;

    // Check if this product is already in the cart for this user
    $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name='$name' AND user_id='$user_id'");
    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added in your cart';
    } else {
        // Insert the product into the cart for this user
        $query = "INSERT INTO `cart`(`user_id`, `name`, `price`, `image`, `quantity`) VALUES ('$user_id','$name','$price','$image','$quantity')";
        $insert_query = mysqli_query($connection, $query);
        if ($insert_query) {
            $message[] = 'Product added in your cart';
        } else {
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
    <title>Art Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="Art.css">
    <style>
    
        /* Dropdown Button */
.dropbtnA 
{
    /* background-color: #04AA6D; */
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}
.dropbtnP 
{
    /* background-color: #04AA6D; */
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdownA {
  position: relative;
  display: inline-block;
}
.dropdownP {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-contentA {
  display: none;
  position: absolute;
  /* background-color: #f1f1f1; */
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-contentP {
  display: none;
  position: absolute;
  /* background-color: #f1f1f1; */
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-contentA a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-contentP a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-contentA a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdownA:hover .dropdown-contentA {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
/* .dropdown:hover .dropbtn {background-color: #3e8e41;} */

/* Change color of dropdown links on hover */
.dropdown-contentP a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdownP:hover .dropdown-contentP {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
/* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
    </style>
</head>

<body>
    <header id="header">
        <a href="#"><img id="Logo-header" src="DesignEclatlogo1.png" alt="im not available"></a>
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
                <a href="../HomePageUser.php">Back</a>
                <a href="./AboutUs-Page/AboutUsPage.php">About</a>
                <div class="dropdownP">
                    <a href="" class="dropbtnP">Products</a>
                    <div class="dropdown-contentP">
                        <a href="fashion.php">Fashion</a>
                        <a href="jewellery.php">jewellery</a>
                    </div>
                </div>
                <a href="./email-form">Contact</a>
                <a href="cart.php" class="cart"><i class='fas fa-shopping-cart'></i><span><?php echo $row_count; ?></span></a>
            </div>
        </div>
    </header>
    <h1>Art Works</h1>

    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<div class="message">' . $msg . '</div>';
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
