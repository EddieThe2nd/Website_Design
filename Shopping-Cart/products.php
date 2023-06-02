<?php
include 'connection.php';

if(isset($_POST['add_to_cart'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = 1;
    
    $select_cart =mysqli_query($connection,"SELECT * FROM `cart` WHERE name='$name'");
    if(mysqli_num_rows($select_cart)>0){
        $message[]='product already added in your cart';
    }
    else{
        $query = "INSERT INTO `cart`(`name`, `price`, `image`, `quantity`) VALUES ('$name','$price','$image','$quantity')";
        $insert_query = mysqli_query($connection,$query);
        $message[]= 'product added in your cart';
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css">
    <title>products</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">
                    <span>'.$message.'<i class="bi bi-x"
                        onclick="this.parentElement.style.display=`none`"></i></span>
                    </div>                
                ';
            }
        }
    
?>
<div class="product-container">
    <h1>Available products</h1>
    <div class="product-item-container">
        <?php 
            $select_products = mysqli_query($connection,"SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0) {
                while($fetch_products = mysqli_fetch_assoc($select_products)){
                
            ?>
            <form method="post">
                <div class="box">
                    <img src="image/<?php echo $fetch_products['image']; ?>">
                    <h3><?php echo $fetch_products['name'];?></h3>
                    <div class="price">R<?php echo $fetch_products['price']; ?>/-</div>
                    <input type="hidden" name="name" value="<?php echo $fetch_products['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $fetch_products['price']; ?>">
                    <input type="hidden" name="image" value="<?php echo $fetch_products['image']; ?>">
                    <input type="submit" name="add_to_cart" value="add to cart" class="btn">
                </div>
            </form>
               
        <?php 
            }

        }
        ?>
    </div>
</div>
</body>
</html>