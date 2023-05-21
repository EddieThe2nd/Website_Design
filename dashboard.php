<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJ-DesignEclat</title>
    <link rel="stylesheet" href="dashboard.css">
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
			<li><a href="#">Users</a></li>
			<li><a href="#">Products</a></li>
			<li><a href="#">Orders</a></li>
			<li><a href="#">Deliveries</a></li>
			<li><a href="#">Settings</a></li>
		</ul>
	</div>
	<div class="main-content">
		<h1>Welcome to the Admin Dashboard</h1>
		<p></p>

		<div class="panel">
			<h2>Users</h2>
			<div class="number">
			<span class="count" data-count="500">0</span>
			<div class="bubble"></div>
			</div>
		</div>

		<div class="panel">
			<h2>Orders</h2>
			<div class="number">
			<span class="count" data-count="2500">0</span>
			<div class="bubble"></div>
			</div>
		</div>
		
		<div class="panel">
			<h2>Visitors</h2>
			<div class="number">
				<span class="count" data-count="10000">0</span>
			<div class="bubble"></div>
			</div>
		</div>
		
		<div class="panel2">
			<h2>Sales by Category</h2>
			<div class="chart-container">
				<canvas id="bar-chart"></canvas>
				<canvas id="pie-chart"></canvas>
			</div>
		</div>

	</div>
	
	<script src="dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>