<?php
require 'partials/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $itemID = $_GET['itemID'];
} else {
    header("Location: welcome.php");
    exit();
}

try {
    $sql = "SELECT * FROM `product` WHERE `product_id` = '$itemID'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception(mysqli_error($conn));
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
if (isset($result)) {
    foreach ($result as $row) {
        $itemName = $row['name'];
        $itemPic = $row['imglink'];
        $itemPrice = $row['price'];
        $description = $row['info'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $itemName; ?> Details</title>
</head>

<body>
    <?php require 'partials/_nav.php'; ?>

    <div class="container mt-4">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $itemPic; ?>" alt="Item Image" class="card-img-top item-img">
                </div>
                <div class="col-md-8 seperation">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $itemName; ?></h2>
                        <p class="money-text">₹<?php echo number_format($itemPrice, 2); ?></p>
                        <p class="card-text"><?php echo $description; ?></p>    


                        <form action="cart_handler.php" method="POST">
                            <button type="submit" name="additem" class="btn btn-success">+ Add to Cart</button>
                            <input type="hidden" name="itemName" value="<?php echo $itemName; ?>">
                            <input type="hidden" name="price" value="<?php echo $itemPrice; ?>">
                        </form>
                        <br>
                        <a href="welcome.php" class="btn btn-outline-primary">Back to shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column justify-content-end">
        <?php require 'partials/footer.php'; ?>
    </div>
</body>

</html>