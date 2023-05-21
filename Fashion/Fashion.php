<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion</title>
    <link rel="stylesheet" href="./Fashion.css">
    <script src="fashion.js"></script>

</head>
<body>

    <div class="video_container">
        <video autoplay muted loop id="myVideo">
            <source src="4k ink drop black.mp4" type="video/mp4">
        </video>
    </div>

    <section>
        <div class="header">
            <h2>Fashion<h2>       
        </div>
    </section>
    <br>
    <br>
        <!-- <h1 class="Heading">Welcome to the World of Art Re-Imagined</h1> -->
    <section class="container content-section">
        <div class="shop_items">
            <div class="item">
                <img src="./Fashion-Clothes/050d7331903304f276da85f2fca4cd33.jpg" alt="" class="img1">
                <p class="item_title">MaXhosa Premium Blue</p>
                <div class="price_button_cont">
                    <span class="item_price">R580.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/40da5adc400bb2f3f02937dc4219fe6a.jpg" alt="" class="img1">
                <p class="item_title">Mens' Ace Vanilla Jacket</p>
                <div class="price_button_cont">
                    <span class="item_price">R180.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/7be4f1bc40ed4fcf9fa78b62f428b725.webp" alt="" class="img1">
                <p class="item_title">Africanasisty Red</p>
                <div class="price_button_cont">
                    <span class="item_price">R200.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/africa-kusini-mitindo-mavazi.jpg" alt="" class="img1">
                <p class="item_title">Makoti Aqua Blue</p>
                <div>
                    <span class="item_price">R95.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            
        </div>
    </section>
    <br>
    <br>
    <section class="container content-section">
        <div class="shop_items">
            <div class="item">
                <img src="./Fashion-Clothes/c24851402effa6babfa2e7d467a658bc--designers.jpg" alt="" class="img1">
                <p class="item_title">MotherLand by Randy</p>
                <div>
                    <span class="item_price">R70.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/c27dab23dc165cedf82474faad4ddf52--laurent-men-fashion.jpg" alt="" class="img1">
                <p class="item_title">Mens' Black Suede Coat</p>
                <div>
                    <span class="item_price">R420.79</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/de18f50dd690625b77f68888711ed42d.jpg" alt="" class="img1">
                <p class="item_title">Mens' Black Cotton Coat</p>
                <div>
                    <span class="item_price">R1000.0</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/R.png" alt="" class="img1">
                <p class="item_title">MaXhosa Orange Two Piece</p>
                <div>
                    <span class="item_price">R1780.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            
        </div>
    </section>
    <br>
    <br>
    <section class="container content-section">
        <div class="shop_items">
            <div class="item">
                <img src="./Fashion-Clothes/A.jpg" alt="" class="img1">
                <p class="item_title">Pablo Hoodie</p>
                <div>
                    <span class="item_price">R80.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/B.jpg" alt="" class="img1">
                <p class="item_title">Pablo Hoodie(Special edition)</p>
                <div>
                    <span class="item_price">R70.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/C.jpg" alt="" class="img1">
                <p class="item_title">Lost Hoodie</p>
                <div>
                    <span class="item_price">R50.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
            <div class="item">
                <img src="./Fashion-Clothes/D.jpg" alt="" class="img1">
                <p class="item_title">Ladies' Lost Hoodie</p>
                <div>
                    <span class="item_price">R90.69</span>
                    <button class="add_button" type="button">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>
        <br>
        <br>
        <br>
    <section class="container content-section" id="cart_container">
        <h2 class="section-header">CART</h2>
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">ITEM</span>
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
        <div class="cart-items">
        </div>
        <div class="cart-total">
            <strong class="cart-total-title">Total:</strong>
            <span class="cart-total-price">R0</span>
        </div>
        <button class="btn btn-primary btn-purchase" type="button">CHECKOUT</button>
    </section>

</body>
</html>