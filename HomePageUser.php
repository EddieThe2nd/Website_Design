<?php
    Session_start();
    require('./config/server.php');

    // Assuming the user's ID is stored in the session variable
    // Assuming the user's ID is stored in the session variable
    $userId = $_SESSION['user_id'];

    // Fetch the user's profile picture from the database
    $query = "SELECT `profile_picture` FROM `users` WHERE `user_id` = $userId";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) 
    {
    $row = mysqli_fetch_assoc($result);
    $profilePicture = $row['profile_picture'];
    
    } 
    else 
    {
    // Profile picture not found in the database, handle the error
    $profilePicture = './profile_pictures/logo.png'; // Provide a default profile picture
    }


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJ-DesignEclat</title>
    <link rel="stylesheet" href="HomePageUser.css">
    
</head>
<body>
    <section id="header">
        <a  href="#"><img id="Logo-header" src="./Images/Design Eclat-TransparentBlueTree.png" alt=""></a>
        <div>
            <ul id="navbar">
                <li> <a class="active" href="HomePageUser.php">Home</a></li>
                <li><a href="./AboutUs-Page/AboutUsPage.php">About Us</a></li>           
                <li><a href="./Artists/ArtistPage.php">Artist</a></li>
                <li><a href="#">Products</a>
                    <div class="Subpg1">
                        <ul>
                            <li><a href="./Art/Art.php">Art</a></li>
                            <li><a href="./Fashion/Fashion.php">Fashion</a></li>
                            <li><a href="./Jewellery/Jewellery.php">Jewellery</a></li>
                        </ul>
                    </div>
                
                </li>  
                <li><a href="./ContactUs/ContactUsPage.php">Contact</a></li>
                <li ><a href="Cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                <li> <img src="./profile_pictures/<?php echo $profilePicture; ?>" id="user-pic" onclick="toggleMenu()"></li>  
            </ul>

            <div class="subMenuWrap" id="subMenu">
                <div class="subMenu">
                    <div class="user-info">
                    <img src="./profile_pictures/<?php echo $profilePicture; ?>" id="user-pic" onclick="toggleMenu()">

                        <h4>Andrew Letsepe</h4>
                    </div>
                    <hr>

                    <a href="profile.php" id="subMenuLink">
                        <img src="./FeaturedProductsImages/user.png" alt="">
                        <p id="profile"> Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="#" id="subMenuLink">
                        <img src="./FeaturedProductsImages/settings.png" alt="">
                        <p>Settings & Privacy</p>
                        <span>></span>
                    </a>
                    <a href="#" id="subMenuLink">
                        <img src="./FeaturedProductsImages/help-web-button.png" alt="">
                        <p>Help & support</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" id="subMenuLink">
                        <img src="./FeaturedProductsImages/logout.png" alt="">
                        <p>Log Out</p>
                        <span>></span>
                    </a>
                    
                </div>
                
                
            </div>
        </div>
        
    </section>

    <section id="hero">
        <h2>F A D A: Designing The Future!</h2><br> <br>
        <h2>High Class UJ Creations to The World</h2> <br>
        <p>Art, Fashion and Jewellery Offerings that will transform your world</p> 
        <button id="shop">Shop Now</button>
        <video controls autoplay muted loop src="./UJ End of Year Exhibition.mp4" width="600"></video>

    </section>

    
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Inovative UJ products from multiple disciplines</p>
        <div class="pro-container"> 
            <div class="pro">
                <img src="FeaturedProductsImages/reusable pads.png" alt="">
                <div class="des">
                    <span>UJ Design</span>
                    <h5>Reusable Sanitary Pads</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R150</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart" ></i></a>

            </div>
            <div class="pro">
                <img src="FeaturedProductsImages/TERA-03 sports shoe.png" alt="">
                <div class="des">
                    <span>UJ Design</span>
                    <h5>Cross-discipline Sports Shoes</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R800</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart" ></i></a>

            </div>
            <div class="pro">
                <img src="FeaturedProductsImages/educational blocks.png" alt="">
                <div class="des">
                    <span>UJ Design</span>
                    <h5>Educational Blocks/h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R400</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart" ></i></a>

            </div>

        </div>

    </section>
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign up for Newsletter</h4>
            <p>Get E-mail updates about our latest projects and <span> special offers.</span></p>
        </div>
        <div class="form">
            <input type="email" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img style="width: 130px; height: 140px;" id="footer-Logo" src="./Images/Design Eclat-TransparentBlueTree.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> Faculty of Art, Design and Architecture, Cottesloe, Johannesburg, 2092</p>
            <p><strong>Phone:</strong> +27 11 559 4555</p>
            <p><strong>Hours:</strong>09am-4pm, Mon - Fri</p>
            </div>

        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>


        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">View Cart</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>


        </div>

        <div class="col payment">
            <p>Secure Payment Gateways</p>
            <img src="Images/secure pg.png" alt="">   
        </div>

        <div class="copyright">
            <p>© 2023 UJ-Design, All Rights Reserved</p>
        </div>

    </footer>


    <script src="./project.js " ></script>
    <script src="HomePageUser.Js"></script>
</body>
</html>