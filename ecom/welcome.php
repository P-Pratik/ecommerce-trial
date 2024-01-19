<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header('Location: login.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="welcome.css">
</head>
  <body>
  <?php require 'partials/_nav.php'?>
  <?php
    if($_SESSION['loggedin']==true){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class='card-container d-flex flex-row justify-content-around'>
        <div class="item-card">
            <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/f/s/fsc_ta_rr_5.jpg"
            class="item-img">
            <div class="item-info">
                <br>
                <h6>Yamaha FSC-TA Ruby Red Acoustic Guitar</h6>
                <div class="d-flex flex-row justify-content-start">
                    <p class="money-text">₹62,490.00</p>
                    <button class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="item-card">
            <img src="https://m.media-amazon.com/images/I/51I019jm4wL.jpg"
            class="item-img">
            <div class="item-info">
                <br>
                <h6>Ibanez Bass Guitar SR series Standard 6 string</h6>
                <div class="d-flex flex-row justify-content-start">
                    <p class="money-text">₹44,390.00</p>
                    <button class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="item-card">
            <img src="https://m.media-amazon.com/images/I/61kSImd1LsL._SL1500_.jpg"
            class="item-img">
            <div class="item-info">
                <br>
                <h6>Kadence Acoustic Begginers Drum Kit (5-piece) with Cymbals</h6>
                <div class="d-flex flex-row justify-content-start">
                    <p class="money-text">₹32,620.00</p>
                    <button class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="item-card">
            <img src="https://m.media-amazon.com/images/I/51MXyutGxIL._SL1000_.jpg"
            class="item-img">
            <div class="item-info">
                <br>
                <h6>Yamaha FSC-TA Ruby Red Acoustic Guitar</h6>
                <div class="d-flex flex-row justify-content-start">
                    <p class="money-text">₹15,540.00</p>
                    <button class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
