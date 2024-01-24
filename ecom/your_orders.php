<?php
session_start();
require 'partials/_dbconnect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}

$userEmail = $_SESSION['Email'];
$sql = "SELECT * FROM orders WHERE email = '$userEmail'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/your_orders.css?v=<?php echo time(); ?>">
</head>

<body class="body-prop bg-navy">
    <?php require 'partials/_nav.php'?>
    <div class="d-flex flex-row justify-content-center my-4">
        <h1 class="orders-text">Your Orders</h1>
    </div>

    <?php if ($result->num_rows > 0) : ?>
        <div class="ex-padding d-flex flex-row justify-content-center">
            <table class="table table-responsive table-border table-bordered table-striped table-dark table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Arrival Status</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    while ($row = $result->fetch_assoc()) :
                        $orderItems = json_decode($row['items'], true);

                        foreach ($orderItems as $orderItem) :
                    ?>
                            <tr>
                                <td><img src="<?php echo $orderItem['item_pic']; ?>" alt="Item Image" class="cart-img"></td>
                                <td><?php echo $orderItem['item_name']; ?></td>
                                <td><?php echo $orderItem['item_quantity']; ?></td>
                                <td>₹<?php echo $orderItem['item_price']; ?></td>
                                <td>₹<?php echo $orderItem['item_price'] * $orderItem['item_quantity']; ?></td>
                                <td>Arriving in a few days</td>
                            </tr>
                    <?php
                        endforeach;
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="d-flex justify-content-center mt-4">
            <p>No pending orders</p>
        </div>
    <?php endif; ?>

</body>

</html>
