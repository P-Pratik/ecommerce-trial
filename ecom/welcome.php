<?php
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     header('Location: login.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/welcome.css">
</head>

<style>
        .card img{
            height: 25rem;
            object-fit: cover;
        }


</style>

<body data-bs-theme="dark">
    <?php require 'partials/_nav.php' ?>

    <!-- <?php
            if ($_SESSION['loggedin'] == true) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            }
            ?> -->

    <div class="container-fluid p-5">
        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2  row-cols-1 g-5">
            <div class="col">
                <div class="card">
                    <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/f/s/fsc_ta_rr_5.jpg" class="card-img-top" alt="Instrument1">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha FSC-TA Ruby Red Acoustic Guitar</h5>
                        <p class="card-text fs-5 text-success">₹62,490.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha FSC-TA Ruby Red Acoustic Guitar">
                            <input type="hidden" name="price" value="62490">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://m.media-amazon.com/images/I/51I019jm4wL.jpg" class="card-img-top" alt="Instrument1">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Ibanez Bass Guitar SR series Standard 6 string</h5>
                        <p class="card-text fs-5 text-success">₹44,390.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Ibanez Bass Guitar SR series Standard 6 string">
                            <input type="hidden" name="price" value="44390">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://m.media-amazon.com/images/I/61kSImd1LsL._SL1500_.jpg" class="card-img-top" alt="Instrument3">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Kadence Acoustic Begginers Drum Kit</h5>
                        <p class="card-text fs-5 text-success">₹62,490.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Kadence Acoustic Begginers Drum Kit">
                            <input type="hidden" name="price" value="62490">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://m.media-amazon.com/images/I/51MXyutGxIL._SL1000_.jpg" class="card-img-top" alt="Instrument1">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha FSC-TA Ruby Red Acoustic Guitar</h5>
                        <p class="card-text fs-5 text-success">₹15,540.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha FSC-TA Ruby Red Acoustic Guitar">
                            <input type="hidden" name="price" value="15540">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- <div class='card-container d-flex flex-row justify-content-around'>
        <div class="item-card">
            <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/f/s/fsc_ta_rr_5.jpg" class="item-img">
            <div class="item-info">
                <br>
                <h6>Yamaha FSC-TA Ruby Red Acoustic Guitar</h6>
                <div class="d-flex flex-row justify-content-start">
                    <p class="money-text">₹15,540.00</p>
                    <button class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="item-card">
            <img src="https://m.media-amazon.com/images/I/51I019jm4wL.jpg" class="item-img">
            <div class="item-info">
                <form action="cart_handler.php" method="post">
                    <br>
                    <h6>Ibanez Bass Guitar SR series Standard 6 string</h6>
                    <div class="d-flex flex-row justify-content-start">
                        <p class="money-text">₹44,390.00</p>
                        <button type="submit" name="additem" class="btn btn-success">Add to Cart</button>
                        <input type="hidden" name="itemName" value="Instrument1">
                        <input type="hidden" name="price" value="44390">
                    </div>
                </form>
            </div>
        </div>

        <div class="item-card">
            <img src="https://m.media-amazon.com/images/I/61kSImd1LsL._SL1500_.jpg" class="item-img">
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
            <img src="https://m.media-amazon.com/images/I/51MXyutGxIL._SL1000_.jpg" class="item-img">
            <div class="item-info">
                <br>
                <h6>Yamaha FSC-TA Ruby Red Acoustic Guitar</h6>
                <div class="d-flex flex-row justify-content-start">
                    <p class="money-text">₹15,540.00</p>
                    <button class="btn btn-success">Add to Cart</button>
                </div>
            </div>
        </div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>