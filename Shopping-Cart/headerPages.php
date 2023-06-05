<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
</head>
<body>
    <header>
            <?php 
                $select_rows = mysqli_query($connection,"SELECT * FROM `cart`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);
            ?>
           <!-- <a href="cart.php" class="cart"><i class="fas fa-shopping-cart"></i><span><?php //echo $row_count; ?></span></a> -->

        </div>
    </header>
</body>
</html>