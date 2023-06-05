<?php
require('./config/server.php');	

$sql = " SELECT `delivery_id`, `user_id`, `total_products`, `price`, `address`, `city`, `state`, `zip_code`, `order_id` FROM `deliveries`";
$result = mysqli_query($connection, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJ-DesignEclat</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <header>
		<div class="profile">
			<img src="./FeaturedProductsImages/user.png" alt="Profile Picture">
			<h3>Admin</h3>
		</div>
	</header>
	<div class="sidebar">
		<h2>Dashboard</h2>
		<ul>
			<li><a href="AdminUsers.php">Users</a></li>
			<li><a href="./Shopping-Cart/product_form.php">Products</a></li>
			<li><a href="AdminOrders.php">Orders</a></li>
			<li><a href="AdminDeliveries.php">Deliveries</a></li>
			<li><a href="#">Settings</a></li>
		</ul>
	</div>
	<div class="main-content">
		<form action="">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Delivery ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Products Delivered</th>
                    <th scope="col">Products Price</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Province</th>
                    <th scope="col">Zip Code</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                <td>$row[delivery_id]</td>
                                <td>$row[order_id]</td>
                                <td>$row[user_id]</td>
                                <td>$row[total_products]</td>
                                <td>$row[price]</td>
                                <td>$row[address]</td>
                                <td>$row[city]</td>
                                <td>$row[state]</td>
                                <td>$row[zip_code]</td>
                                
                            </tr>
                            ";
                        }
                    }else{
                        echo "No record found";
                    }
                ?>
                <tr>
            </tbody>
        </table>
        </form>

	</div>
	
	<script src="dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>