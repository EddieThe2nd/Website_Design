<!-- tumelo -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./homePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <header id="header">
        <a  href="#"><img id="Logo-header" src="./DesignEclatlogo1.png" alt=""></a>
        <div class="menu-btn"></div>
        <div class="navigation">
            <div class="navigation-items">
                <a href="./AboutUs-Page/AboutUsPage.php">About</a>
                <a href="./Shopping-Cart/art.php">Art</a>
                <a href="./Shopping-Cart/fashion.php">Fashion</a>
                <a href="./Shopping-Cart/jewellery.php">jewellery</a>
                <a href="./Artists/ArtistPage.php">Artists</a>
                <a href="./ContactUs">Contact</a>
                <!-- <a href="logout.php" class="btn">Logout</a> -->
            </div>
        </div>
    </header>
    <section class="home">
        
        <video class="video-slide" src="./Landing page animation/fashionslider3.mp4" autoplay muted loop></video>
        <video class="video-slide" src="./Landing page animation/Slider2FashionShow.mp4"  autoplay muted loop></video>
        <video class="video-slide" src="./Landing page animation/Slider1.mp4" autoplay muted loop></video>
        <video class="video-slide" src="./Landing page animation/jewelleryslider2.mp4" autoplay muted loop></video>
        <video class="video-slide" src="./Landing page animation/artabstractSlider1.mp4" autoplay muted loop></video>
        <div class="content">
            <h1>Designing the future!<br> <span>UJ Creations to The World.</span> </h1>
            <p>Fashion,Art and jewellery design the UJ way that enables empowering transformation through visual expression.</p>
            <button class="fada-button"><a href="AboutUs-Page/AboutUsPage.php" >Read More</a></button>
   
        </div>
        <div class="media-icons">
        <a href="https://www.facebook.com/UJFADA/" class="fa fa-facebook"></a>
            <a href="https://www.instagram.com/ujfada/" class="fa fa-instagram"></a>
            <a href="https://twitter.com/go2uj/status/1643238856202805248" class="fa fa-twitter"></a>            
        </div>
        <div class="slider-navigation">
            <div class="nav-btn active"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
        </div>
    </section>
    <section class="exhibition">
        <h2 class="header">End of Year Exhibition</h2>

        <video controls autoplay muted loop src="./Landing page animation/UJ End of Year Exhibition.mp4" width="650"></video>

    
    <div class="text">
        <p class="textP">Join us at the exciting end of year exhibition to showcase creative projects and arts embodied by FADA.</p>

        <button class="exhibition-button"><a href="https://web.uj.ac.za/fada-exhibition/" target="_blank">Read More</a></button>
    </section>   
    <!-- featured products section -->
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
                <a href="#"><i class="fa fa-shopping-cart"></i></i></a>
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
                <a href="#"><i class="fa fa-shopping-cart"></i></i></a>

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
                <a href="#"><i class="fa fa-shopping-cart"></i></i></a>
                </div>

        </div>
        <button id="featured-button"><a href="./FeaturedProductsImages/FeaturedProducts.php">See More</a></button>

    </section>

    <!-- newsletter and footer sections -->

    <section id="newsletter" class="section-p1">

        <div class="newstext">
            <h4>Sign up for Newsletter</h4>
            <p>Get E-mail updates about our latest projects and <span> special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <?php include "footer.php"?>



    <script type="text/javascript">
    // script for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
        menuBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    });

    // script for video slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    let currentSlide = 0;

    function slideNav(manual) {
        btns.forEach((btn) => {
            btn.classList.remove("active");
        });

        slides.forEach((slide) => {
            slide.classList.remove("active");
        });

        btns[manual].classList.add("active");
        slides[manual].classList.add("active");
        currentSlide = manual;
    }

    function autoSlide() {
        currentSlide++;
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        slideNav(currentSlide);
    }

    window.onload = function () {
        setTimeout(function () {
            slideNav(0); // Set initial slide
            setInterval(autoSlide, 4000); // Start the interval
        }, 1000); // Delay start by 1 second
    };

    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            slideNav(i);
        });
    });
</script>


</body>
</html>