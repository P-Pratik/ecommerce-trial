<?php
include('partials/_nav.php');

if (empty($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: login.php');
    exit();
}


$totalCost = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $totalCost += $value['price'] * $value['quantity'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <br><br>
    <div class='container-fluid row gx-5 '>
        <div class="container col-8 p-5">

            <form action="checkout_handler.php" method="post">

                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="col mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>
                    <div class="col mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="col mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" required>
                    </div>

                </div>


                <div class="d-flex flex-row justify-content-between">
                    <div class="payment-select-container">
                        <select class="form-select payment-select">
                            <option selected>Select Payment method</option>
                            <option value="1">Cash on Delivery (CoD)</option>
                            <option value="2">Net Banking</option>
                            <option value="3">UPI/QR Payment</option>
                            <option value="4">Credit/Debit Card Payment</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Place Order">
                </div>
                
            </form>

        </div>

        <div class="container col-4 bg-body-tertiary p-5 rounded">
            <h3 class="fw-semibold">Order Summary</h3>
            <div class="row">
                <table class="table table-bordered p-3 rounded">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo "
                                    <tr>
                                        <td class='itemName'>" . $value['itemName'] . " x " . $value['quantity'] . "</td>
                                        <td class='price'> ₹" . $value['price'] * $value['quantity'] . "</td>
                                    </tr>";
                            }
                        }
                        ?>

                    </tbody>
                </table>
                <p class="fw-semibold">Total: ₹<span> <?php echo $totalCost ?></span></p>

            </div>
        </div>
    </div>

</body>

</html>