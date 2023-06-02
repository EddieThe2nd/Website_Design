<?php
include 'connection.php';

if(isset($_POST['add_product'])){
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_temp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'image/'.$p_image;

    $query = "INSERT INTO `products`(`name`, `price`, `image`) VALUES ('$name','$price','$p_image')";
    $insert_query = mysqli_query($connection,$query);

    if($insert_query){
        move_uploaded_file($p_image_temp_name,$p_image_folder);
        $message[] ='product added successfully';
        
        if (strpos($p_image, 'jewellery') !== false) {
            header('location:Jewellery.php'); // Redirect to the jewellery page
        } else if (strpos($p_image, 'fashion') !== false) {
            header('location:fashion.php'); // Redirect to the fashion page
        } else if (strpos($p_image, 'art') !== false) {
            header('location:art.php'); // Redirect to the art page
        } else {
            header('location:defaults.php'); // Redirect to a default page if necessary
        }
    } else {
        $message[] ='product not added successfully';
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
    <title>Adding Products</title>
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
    <div class="form">
        <form  method="post" enctype="multipart/form-data">
            <h3>Add a New Product</h3>
            <input type="text" name="p_name" placeholder="Enter product name" required>
            <input type="text" name="p_price" placeholder="Enter product price" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" required>
            <input type="submit" name="add_product" value="Add Product" class="btn" required>
        </form>
    </div>
</body>
</html>
