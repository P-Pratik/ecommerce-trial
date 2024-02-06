<?php
include('partials/_nav.php');
include('partials/_dbconnect.php');
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<style>
    .card img {
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


            <?php
            try {
                $sql = "SELECT * FROM `product`";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    throw new Exception(mysqli_error($conn));
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            if (isset($result)) {
                foreach ($result as $row) { ?> 

                    <div class="col">
                        <div class="card">
                            <img src=<?php echo $row['imglink'] ?> class="card-img-top" alt="<?php echo $row['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title fs-4"><?php echo $row['name'] ?></h5>
                                <p class="card-text fs-5 text-success">₹<?php echo $row['price'] ?></p>
                                
                                <form action="cart_handler.php" method="post">
                                    <button type="submit" name="additem" class="btn btn-primary">Add to cart</button>
                                    <input type="hidden" name="itemName" value= "<?php echo $row['name'] ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                                </form>

                                <form action="item_page.php" method="get">
                                    <button class="btn btn-outline-primary">Details</button>
                                    <input type="hidden" name="itemID" value="<?php echo $row['product_id'] ?>">
                                </form>
                            </div>
                        </div>
                    </div>

            <?php }
            }; ?>


        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>

</html>