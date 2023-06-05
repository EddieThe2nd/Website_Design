
<?php
include 'connection.php';
session_start(); // ensure you have started session if you haven't done so elsewhere

$user_id = $_SESSION['user_id']; // get user id from session

if(isset($_POST['update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];

    $update_query = mysqli_query($connection,"UPDATE `cart` SET quantity='$update_value' WHERE id='$update_id' AND user_id='$user_id'") or die ('query failed');

    if($update_query){
        header('location:cart.php');
    }
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($connection,"DELETE FROM `cart` WHERE id='$remove_id' AND user_id='$user_id'");
    header('location:cart.php');
}
if(isset($_GET['delete_all'])){
    mysqli_query($connection,"DELETE FROM `cart` WHERE user_id='$user_id'");
    header('location:cart.php');
}

    $select_cart = mysqli_query($connection,"SELECT * FROM `cart` WHERE user_id='$user_id'");

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css">
    <title>adding products</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="cart-container">
        <h1>shopping cart</h1>
        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php 
                    $select_cart = mysqli_query($connection,"SELECT * FROM `cart`");
                    $grand_total=0;
                    if(mysqli_num_rows($select_cart)>0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){

                        
                    
                ?>
                <tr>
                    <td><img src="image/<?php echo $fetch_cart['image']; ?>" ></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td>R<?php echo $fetch_cart['price']; ?></td>
                    <td class="quantity">
                        <form method="post">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" min="1" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" value="update" name="update_btn">
                        </form>
                    </td>
                    <td>R<?php echo $sub_total = number_format($fetch_cart['price']*$fetch_cart['quantity']); ?></td>
                    <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart');" class="delete-btn">remove</a></td>
                </tr>
                <?php 

                 $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                 $grand_total += $sub_total;
                    
                        }
                    }
                ?>
                <tr class="table-bottom">
                    <td><a href="products.php" class="option-btn">continue shopping</a></td>
                    <td colspan="3"><h1>total amount payable</h1></td>
                    <td style="font-weight: bold;">R<?php echo $grand_total; ?></td>
                    <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all item from cart');" class="delete-btn">delete all</a></td>
                </tr>              
            </tbody>
        </table>
        <div class="checkout-btn">
            <a href="../payment gateway/Payment.php" class="btn <?=($grand_total>1)?'':'disabled'?>">proceed to checkout</a>
        </div>
    </div>
    
</body>
</html>