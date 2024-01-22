<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/welcome.css?v=<?php echo time(); ?>"> 
</head>
  <body class="body-prop">
  <?php require 'partials/_nav.php'?>
  <?php
    // if($_SESSION['loggedin']==true){
    // echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> You are logged in...
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    // </div>';
    // }

    if((isset($_SESSION["alr_added"])) && $_SESSION['alr_added']==true){
        echo"
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Item is already present in the cart</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        unset($_SESSION['alr_added']);
    }

    if((isset($_SESSION["added"])) && $_SESSION["added"]==true){
        echo"
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Added to Cart</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        unset($_SESSION['added']);
    }
    
    if((isset($_SESSION["order_placed"])) && $_SESSION["order_placed"]==true){
        echo"
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Your order has been placed! </strong>Rest assured, it should arrive in a couple of days.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        unset($_SESSION['order_placed']);
    }

    ?>
    <div class='card-container d-flex flex-row justify-content-around'>
        <div class="item-card text-center">
            <img src="https://www.stars-music.fr/medias/yamaha/fsc-ta-transacoustic-cutaway-epicea-acajou-rw-600-184862.jpg"
            class="item-img">
            <form action="item_page.php" method="POST">
                <div class="item-info">
                    <br>
                    <h6 class="h6-text">Yamaha FSC-TA Ruby Red Acoustic Guitar</h6>
                    <div class="d-flex flex-row justify-content-around">
                        <p class="money-text">₹62,490.00</p>
                        <button type="submit" class="btn btn-outline-info">View Details</button>
                    </div>
                </div>
                <input type="hidden" name="item-pic" value="https://www.stars-music.fr/medias/yamaha/fsc-ta-transacoustic-cutaway-epicea-acajou-rw-600-184862.jpg">
                <input type="hidden" name="item-name" value="Yamaha FSC-TA Ruby Red Acoustic Guitar">
                <input type="hidden" name="item-price" value="62490">
            </form>
        </div>

        <div class="item-card text-center">
            <img src="https://m.media-amazon.com/images/I/51I019jm4wL.jpg"
            class="item-img">
            <form action="item_page.php" method="POST">
                <div class="item-info">
                        <br>
                        <h6 class="h6-text">Ibanez Bass Guitar SR series Standard 6 string</h6>
                        <div class="d-flex flex-row justify-content-around">
                            <p class="money-text">₹44,390.00</p>
                            <button type="submit" class="btn btn-outline-info">View Details</button>
                        </div>
                    </div>
                    <input type="hidden" name="item-pic" value="https://m.media-amazon.com/images/I/51I019jm4wL.jpg">
                    <input type="hidden" name="item-name" value="Ibanez Bass Guitar SR series Standard 6 string">
                    <input type="hidden" name="item-price" value="44390">
            </form>
        </div>

        <div class="item-card text-center">
            <img src="https://m.media-amazon.com/images/I/61kSImd1LsL._SL1500_.jpg"
            class="item-img">
            <form action="item_page.php" method="POST">
                <div class="item-info">
                    <br>
                    <h6 class="h6-text">Kadence Acoustic Begginers Drum Kit with Cymbals</h6>
                    <div class="d-flex flex-row justify-content-around">
                        <p class="money-text">₹32,620.00</p>
                        <button type="submit" class="btn btn-outline-info">View Details</button>
                    </div>
                </div>
                <input type="hidden" name="item-pic" value="https://m.media-amazon.com/images/I/61kSImd1LsL._SL1500_.jpg">
                <input type="hidden" name="item-name" value="Kadence Acoustic Begginers Drum Kit with Cymbals">
                <input type="hidden" name="item-price" value="32620">
            </form>
        </div>

        <div class="item-card text-center">
            <img src="https://m.media-amazon.com/images/I/51MXyutGxIL._SL1000_.jpg"
            class="item-img">
            <form action="item_page.php" method="POST">
                <div class="item-info">
                    <br>
                    <h6 class="h6-text">YAMAHA PSR-E373 61-Keys Portable Keyboard</h6>
                    <div class="d-flex flex-row justify-content-around">
                        <p class="money-text">₹15,540.00</p>
                        <button class="btn btn-outline-info">View Details</button>
                    </div>
                </div>
                <input type="hidden" name="item-pic" value="https://m.media-amazon.com/images/I/51MXyutGxIL._SL1000_.jpg">
                <input type="hidden" name="item-name" value="YAMAHA PSR-E373 61-Keys Portable Keyboard">
                <input type="hidden" name="item-price" value="15540">
            </form>
        </div>
    </div>
    
  </body>
</html>
