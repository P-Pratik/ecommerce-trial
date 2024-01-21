<?php
include('partials/_nav.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">My Cart</h1>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo "
                                <tr>
                                    <td>" . ($key + 1) . "</th>
                                    <td>" . $value['itemName'] . "</td>
                                    <td> ₹" . $value['price'] . "</td>
                                    <td><input class='text-center' type='number' value='$value[quantity]' min='1' max='10'></td>
                                    <td>
                                    <form action='cart_handler.php' method='post'>
                                        <button type='submit' name='removeItem' class='btn btn-sm btn-outline-danger'>Remove</button>
                                        <input type='hidden' name='itemName' value='$value[itemName]'>
                                    </form>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>
                        <tr>
                            <td colspan='2'>Total:</td>
                            <td colspan='3'><strong> ₹0 </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-outline-warning" >Checkout</button>
</body>

</html>