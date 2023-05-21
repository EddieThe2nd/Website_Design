<?php
    require('./config/server.php');

    
    // $connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_signup.css">
</head>
<body>
	<a  href="#"><img id="Logo-header" src="./Images/Design Eclat-TransparentBlueTree.png" alt=""></a>
    <div class="box">
		<form autocomplete="off">
			<h2>Sign up</h2>
			<div class="inputBox">
				<input type="text" required="required"  name="username" id="name" placeholder="" required>
				<span>	Create Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="password" id="password" placeholder="" required>
				<span>Create Password</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="C_password" id="Cpassword" placeholder="" required>
				<span>Create Password</span>
				<i></i>
			</div>
            <div class="inputBox">
				<input type="email" name="email" id="email" placeholder="" required>
				<span>Email</span>
				<i></i>
			</div>
            <div class="inputBox">
				<input type="text" name = "phone" placeholder ="" required>
				<span>Phone</span>
				<i></i>
			</div>
        
            
			<div class="links">
				<a href="#">Have an account already?</a>
				<a href="LoginPage.html">Login</a>
			</div>
			<input id="submit" type="submit" value="Sign up">
		</form>
	</div>
	<script src="signup.js"></script>
</body>
</html>