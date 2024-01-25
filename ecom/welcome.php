<?php
include('partials/_nav.php');
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     header('Location: login.php');
//     exit();
// }
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="styles/welcome.css"> -->
</head>

<style>
        .card img{
            height: 25rem;
            object-fit: cover;
        }


</style>

<body data-bs-theme="dark">

    <!-- <?php
            if ($_SESSION['loggedin'] == true) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            }
            ?> -->

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://media.istockphoto.com/id/1214897889/photo/close-up-of-electric-guitars-in-a-row-in-huge-instrument-shop-music-instrumental-concept.jpg?s=612x612&w=0&k=20&c=LC9Gi_nxul94nxgBRdVNZZ1cEpLTW_2QYJT1yuEvUT0=" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-semi-bold text-body-emphasis lh-1 mb-3">Welcome to Music Masti Store</h1>
        <p class="lead fw-light">
        Music Masti Store is an online store that specializes in musical instruments and accessories. They offer a wide range of products, including guitars, bass guitars, drums, and more
        </p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start"><a href="#items">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2"> Shop Now</button></a>
        </div>
      </div>
    </div>
  </div>

    <div id='items' class="container-fluid p-5">
        <h1 class="text-center mb-5 display-6">Shop</h1>
        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2  row-cols-1 g-5">
            <div class="col">
                <div class="card">
                    <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/y/d/ydp-105r-01-basic_withoutbench.jpeg" class="card-img-top" alt="Instrument1">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha YDP-105 Arius Digital Piano</h5>
                        <p class="card-text fs-5 text-success">₹89,080.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha YDP-105 Arius Digital Piano">
                            <input type="hidden" name="price" value="89080">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/g/a/ga15iih.jpg" class="card-img-top" alt="Instrument2">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha GA15II Guitar Amplifer</h5>
                        <p class="card-text fs-5 text-success">₹7,590.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha GA15II Guitar Amplifer">
                            <input type="hidden" name="price" value="7590">
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
                    <img src="https://m.media-amazon.com/images/I/51MXyutGxIL._SL1000_.jpg" class="card-img-top" alt="Instrument4">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha DAC-TF Black Keyboard</h5>
                        <p class="card-text fs-5 text-success">₹15,540.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha DAC-TF Black Keyboard">
                            <input type="hidden" name="price" value="15540">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/p/-/p-32d-_1_.jpg" class="card-img-top" alt="Instrument5">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha P-32D Pianica 32-Note Melodica</h5>
                        <p class="card-text fs-5 text-success">₹5,590.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha P-32D Pianica 32-Note Melodica">
                            <input type="hidden" name="price" value="5590">
                        </form>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card">
                    <img src="https://yamaha.ndcdn.in/media/catalog/product/cache/9e0f31af0cdc06df956748b13dabad87/d/t/dtx402k-1.jpg" class="card-img-top" alt="Instrument4">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Yamaha DTX-402K Electronic Drum</h5>
                        <p class="card-text fs-5 text-success">₹52,990.00</p>
                        <form action="cart_handler.php" method="post">
                            <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                            <input type="hidden" name="itemName" value="Yamaha DTX-402K Electronic Drum">
                            <input type="hidden" name="price" value="52990">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>

</html>