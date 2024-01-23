<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

$jsonFile = 'cart_data.json';
$cartData = json_decode(file_get_contents($jsonFile), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_arrived'])) {
    $itemNameToRemove = $_POST['item_name'];
    foreach ($cartData as $key => $item) {
        if ($item['item_name'] === $itemNameToRemove) {
            unset($cartData[$key]);
            break;
        }
    }
    file_put_contents($jsonFile, json_encode($cartData));

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/your_orders.css?v=<?php echo time(); ?>">
</head>

<body class="body-prop">
    <?php require 'partials/_nav.php'?>
    <div class="d-flex flex-row justify-content-center my-4">
        <h1 class="orders-text">Your Orders</h1>
    </div>

    <?php if (!empty($cartData)) : ?>
        <div class='card-container d-flex flex-row justify-content-around'>
            <?php foreach ($cartData as $item) : ?>
                <div class="item-card text-center">
                    <img src="<?php echo $item['item_pic']; ?>" class="item-img">
                    <div class="item-info">
                        <br>
                        <h6 class="h6-text"><?php echo $item['item_name']; ?></h6>
                        <p class="quantity-text">Quantity: <?php echo $item['item_quantity']; ?></p>
                        <p class="money-text">Total Price: ₹<?php echo $item['item_price'] * $item['item_quantity']; ?></p>
                        <p>Arriving in a few days</p>
                        
                        <form method="post" class="mt-2">
                            <button type="submit" name="order_arrived" class="btn btn-success">Order Arrived</button>
                            <input type='hidden' name='item_name' value='<?php echo $item['item_name']; ?>'>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="d-flex justify-content-center mt-4">
            <p>No pending orders</p>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column justify-content-end">
            <?php require 'partials/_footer.php'; ?>
    </div>
</body>

</html>
