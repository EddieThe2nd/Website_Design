<?php 
include 'connection.php';
session_start();

// delete product
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($connection,"DELETE FROM `products` WHERE id=$delete_id") or die('Query failed');

    if($delete_query){
        $message[] = 'Product deleted successfully';
    } else{
        $message[] = 'Product not deleted';
    }
}

// update product
if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_img = $_FILES['update_p_image']['name'];
    $update_p_img_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_folder = 'image/'.$update_p_img;

    $update_query = mysqli_query($connection,"UPDATE `products` SET name='$update_p_name', price='$update_p_price', image='$update_p_img' WHERE id ='$update_p_id'") or die('Query failed');

    if($update_query){
        move_uploaded_file($update_p_img_tmp_name, $update_p_folder);
        $message[] = 'Product has been updated successfully';
        header('location: admin.php');
        exit();
    } else{
        $message[] = 'Product could not be updated successfully';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
</head>
<body>
<?php include 'header.php'; ?>
    <?php
        if(isset($message)){
            foreach($message as $msg){
                echo '<div class="message">
                    <span>'.$msg.'<i class="bi bi-x" onclick="this.parentElement.style.display=`none`"></i></span>
                    </div>';
            }
        }
    ?>
    <a href="product_form.php" class="add">+</a>
    <section class="show-product">
        <table>
            <thead>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products`") or die('Query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($row = mysqli_fetch_assoc($select_products)){
                        echo '<tr>
                            <td><img src="image/'.$row['image'].'"></td>
                            <td>'.$row['name'].'</td>
                            <td>R'.$row['price'].'/-</td>
                            <td>
                                <a href="admin.php?delete='.$row['id'].'" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this item?\')"><i class="glyphicon glyphicon-trash"></i>Delete</a>
                                <a href="admin.php?edit='.$row['id'].'" class="option-btn"><i class="far fa-edit"></i>Update</a>
                            </td>
                        </tr>';
                    }
                }
                else {
                    echo '<tr><td colspan="4">No products found.</td></tr>';
                }
            ?>
            </tbody>
        </table>
    </section>
    <section class="edit-form" style="display: none;">
        <?php 
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($connection,"SELECT * FROM `products` WHERE id=$edit_id") or die('Query failed');

                if(mysqli_num_rows($edit_query) > 0){
                    while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <form method="post" enctype="multipart/form-data">
            <h3>Update Product</h3>
            <img src="image/<?php echo $fetch_edit['image']; ?>">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
            <input type="text" name="update_p_name" value="<?php echo $fetch_edit['name']; ?>" required>
            <input type="number" name="update_p_price" min="0" value="<?php echo $fetch_edit['price']; ?>" required>
            <input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg" required>
            <input type="submit" name="update_product" value="Update Product" class="btn update" required>
            <input type="reset" value="Cancel" class="btn cancle" id="close-edit">
        </form>
        <?php 
                    }
                }
                echo "<script>document.querySelector('.edit-form').style.display = 'block';</script>";
            }
        ?>
    </section>
    
    <script type="text/javascript">
        const closeBtn = document.querySelector('#close-edit');

        closeBtn.addEventListener('click', () => {
            document.querySelector('.edit-form').style.display = 'none';
        });
    </script>
</body>
</html>
