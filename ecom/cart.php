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
                                    <td class='itemName'>" . $value['itemName'] . "</td>
                                    <td class='price'> ₹" . $value['price'] . "</td>
                                    <td class='quantity'><input class='text-center' type='number' value='$value[quantity]' min='1' max='10'></td>
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
                            <td colspan='3' class="totalCost"><strong> ₹0 </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <a href="checkout.php">
        <button class="btn btn-outline-warning">Checkout</button>

        </a>
    </div>

<script>
function updateQuantity(itemName, newQuantity) {
    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(xhr.responseText);
        }
        else {
            console.log("Some error occured");
        }
    };
    xhr.open("POST", "cart_handler.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("updateQuantity=true&itemName=" + itemName + "&newQuantity=" + parseInt(newQuantity));
}

function calcCost() {
    let totalCost = 0;
    let itemName = document.querySelectorAll('.itemName');
    let price = document.querySelectorAll('.price');
    let quantity = document.querySelectorAll('.quantity input');


    for (let i = 0; i < price.length; i++) {
        totalCost += parseInt(price[i].innerText.slice(1)) * parseInt(quantity[i].value);
        updateQuantity(itemName[i].innerText, quantity[i].value);
    }
    document.querySelector('.totalCost').innerHTML = `<strong> ₹ ${totalCost} </strong>`;
    console.log(totalCost);
}

document.addEventListener('change', () => {
    calcCost();
});

calcCost();
</script>
</body>

</html> 