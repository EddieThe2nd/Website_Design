<?php
require('./config/server.php');	

$sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `registered_at`,  `user_address`, `username`, `age`, `Id_number`, `gender`, `Bio` FROM `users`";
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
			<h3>Andrew Letsepe</h3>
		</div>
	</header>
	<div class="sidebar">
		<h2>Dashboard</h2>
		<ul>
            <li><a href="AdminUsers.php">Users</a></li>
			<li><a href="./Shopping-Cart/product_form.php">Products</a></li>
			<li><a href="AdminOrders.php">Orders</a></li>
			<li><a href="AdminDeliveries.php">Deliveries</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="main-content">
		<form action="">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Registered At</th>
                    <th scope="col">User Address:</th>
                    <th scope="col">Bio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                <td>$row[user_id]</td>
                                <td>$row[username]</td>
                                <td>$row[first_name]</td>
                                <td>$row[last_name]</td>
                                <td>$row[Id_number]</td>
                                <td>$row[gender]</td>
                                <td>$row[age]</td>
                                <td>$row[email]</td>
                                <td>$row[contact_no]</td>
                                <td>$row[registered_at]</td>
                                <td>$row[user_address]</td>
                                <td>$row[Bio]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='deleteUser.php?id=$row[user_id]'>Delete</a>
                                    <form><input:submit</form>
                                </td>
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